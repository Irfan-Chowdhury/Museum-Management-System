<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use App\Models\Schedule;
use App\Models\Message;
use App\Models\Museum;
use App\Models\Notice;
use App\Models\Rule;

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
        $message          = new Message();
        $message->name    = $request->name; 
        $message->email   = $request->email; 
        $message->subject = $request->subject; 
        $message->message = $request->message; 
        $message->type    = 'visitor'; 
        $message->save();
        
        session()->flash('message','Message Sent Successfully.');
        
        return redirect()->back();
    }
}
