<?php

namespace App\Http\Controllers\Front\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use App\Models\Museum;
use App\Models\Notice;

class VisitorController extends Controller
{
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
}
