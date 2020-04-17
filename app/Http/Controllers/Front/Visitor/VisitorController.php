<?php

namespace App\Http\Controllers\Front\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoGallery;
class VisitorController extends Controller
{
    public function home()
    {
        $photos = PhotoGallery::where('type','=','slider')
                                ->where('status','=','published')
                                ->get();

        return view('public.pages.visitor.home',compact('photos'));
    }
}
