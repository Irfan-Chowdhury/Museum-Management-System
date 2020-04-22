<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use App\Models\Schedule;
use App\Models\Message;
use App\Models\Museum;
use App\Models\Notice;
use App\Models\Rule;
use App\Models\Item;
use Auth;
use DB;

class VisitorController extends Controller
{
    // public function header()
    // {
    //     $museum = Museum::all();
    //     return view('public.layouts.public-master',compact('museum'));
    // }
    
    public function home()
    {
        $photos = PhotoGallery::where('type','=','slider')
                                ->where('status','=','published')
                                ->get();

        return view('public.pages.visitor.home',compact('photos'));
    }

    public function about()
    {
        $photos = PhotoGallery::where('type','=','about')
                                ->where('status','=','published')
                                ->get();

        $museum  = Museum::get()->first();
        // return $museum;
        return view('public.pages.visitor.about',compact('museum','photos'));
    }

    public function gallery()
    {
        $photos = PhotoGallery::where('status','=','published')
                                ->get();

        return view('public.pages.visitor.gallery',compact('photos'));
    }

    public function notice()
    {
        $notices = Notice::where('status','published')
                        ->orderBy('id','DESC')
                        ->paginate(3);
                        //->get();

        return view('public.pages.visitor.notice',compact('notices'));
    }

    public function notice_read($id)
    {
        $notice  = Notice::find($id); //Single Notice

        $notices = Notice::where('status','published') //For Latest Notice
                        ->orderBy('id','DESC')
                        ->limit(3)
                        ->get();

        return view('public.pages.visitor.notice-read',compact('notice','notices'));
    }

    public function rule()
    {
        $reules = Rule::where('status','published')
                        ->orderBy('id','DESC')
                        ->get();
        
        return view('public.pages.visitor.rule',compact('reules'));
    }

    public function schedule()
    {
        $schedules = Schedule::all();

        return view('public.pages.visitor.schedule',compact('schedules'));
    }

    public function contact()
    {
        $museum = Museum::get()->first();

        return view('public.pages.visitor.contact',compact('museum'));
    }

    public function message_visitor_save(Request $request)
    {
        if (Auth::check()==TRUE) 
        {
            $validator= Validator::make($request->all(),[
                // 'name'      => 'required|string',
                // 'email'     => 'required|string|email',
                'subject'   => 'required|string',
                'message'   => 'required|string',
            ]);
        }
        else{
            $validator= Validator::make($request->all(),[
                'name'      => 'required|string',
                'email'     => 'required|string|email',
                'subject'   => 'required|string',
                'message'   => 'required|string',
            ]);
        }

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        $message = new Message();

        if (Auth::check()==false) 
        {
            $message->name    = $request->name; 
            $message->email   = $request->email; 
            $message->subject = $request->subject; 
            $message->message = $request->message; 
            $message->type    = 'visitor'; 
            $message->save();
        }
        else 
        {
            $message->user_id = Auth::user()->id; 
            $message->subject = $request->subject; 
            $message->message = $request->message; 
            $message->type    = 'user'; 
            $message->save();    
        }
        
        session()->flash('message','Your message has been sent. Thank you!');
        
        return redirect()->back();
    }

    public function item_info(Request $request)
    {
        $items = DB::table('items')
                ->select('category_name','store_direction','items.item_name')
                ->join('categories','categories.id','=','items.category_id')
                ->orderBy('categories.store_direction','ASC')
                ->paginate(10);
                // ->get();

        // $items = Item::with('category')->orderBy('store_direction','ASC')->get();

        return view('public.pages.visitor.item-info',compact('items'));
    }
}
