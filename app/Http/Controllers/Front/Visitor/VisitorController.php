<?php

namespace App\Http\Controllers\Front\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use App\Models\Museum;

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
}
