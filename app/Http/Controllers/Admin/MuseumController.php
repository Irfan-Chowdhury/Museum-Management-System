<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use App\Models\Museum;
use Auth;
use Image;
use File;

class MuseumController extends Controller
{
    public function museum_create()
    {
        return view('admin.pages.museum.museum-create');
    }

    public function museum_save(Request $request)
    {
        //return $request->all();
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'museum_name'    => 'required|string|max:50',
            'description'    => 'required',
            'address'        => 'required',
            'late_long'      => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $museum                 = new Museum();
        $museum->user_id        = Auth::user()->id;
        $museum->museum_name    = $request->museum_name;
        $museum->description    = $request->description;
        $museum->address        = $request->address;
        $museum->late_long      = $request->late_long;

        $museum->save();

        session()->flash('type','success');
        session()->flash('message','Museum Info Added Successful.');
        
        return redirect()->back();
    }

    public function museum_manage()
    {
        $museum = Museum::all()->last();
        // $museum = Museum::orderBy('id', 'desc')->first();

        return view('admin.pages.museum.museum-manage',compact('museum'));



        // Model::all()->last()->id;  //last_id
        // Model::orderBy('id', 'desc')->first()->id;
    }

    public function museum_edit($id)
    {
        $museum = Museum::find($id);

        return view('admin.pages.museum.museum-edit',compact('museum'));
    }

    public function museum_update(Request $request, $id)
    {
        $museum = Museum::find($id);
        $museum->user_id        = Auth::user()->id;
        $museum->museum_name    = $request->museum_name;
        $museum->description    = $request->description;
        $museum->address        = $request->address;
        $museum->late_long      = $request->late_long;

        $museum->update();

        session()->flash('type','success');
        session()->flash('message','Museum Info Updated Successfully.');
        
        return redirect()->route('museum-manage');
    }

    public function museum_delete($id)
    {
        $museum = Museum::find($id);
        $museum->delete();

        session()->flash('type','success');
        session()->flash('message','Museum Info Deleted Successfully.');
        
        return redirect()->back();
    }




    // ================ Photo Gallery ===============


    public function photo_gallery_create()
    {
        $photoGalleries = PhotoGallery::all();
        return view('admin.pages.museum.photo_gallery.photo-gallery-manage',compact('photoGalleries'));
    }

    public function photo_save(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'title'        => 'nullable|string|max:80',
            'description'  => 'nullable|max:500',
            'author'       => 'nullable|max:30',
            'photo'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        if($validator->fails())
        {
            session()->flash('type','danger'); 
            session()->flash('message_ERROR','ERROR !! ');
            session()->flash('message_text',' Please Try Again');

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $photoGallery              = new PhotoGallery();
        $photoGallery->title       = $request->title;
        $photoGallery->description = $request->description;
        $photoGallery->author      = $request->author;
        $photoGallery->type        = $request->type;

        if ($request->hasFile('photo')) 
        {
           // --- Image Intervention Start ---
            $file           = $request->file('photo');
            $imageName      = time().'.'.$file->getClientOriginalExtension();
            $directory      = '/admin/images/photo_gallery/';
            $imageUrl       = $directory.$imageName;
            $upload_path    = public_path().$imageUrl;
            Image::make($file)->resize(1900,700)->save($upload_path);
            
            // --- Image Intervention End ---

            $photoGallery->photo = $imageUrl;
        }

        $photoGallery->save();

        session()->flash('type','success');
        session()->flash('message','Photo Added Successfully.');
        
        return redirect()->back();
    }

    public function photo_update(Request $request, $id)
    {
        $validator= Validator::make($request->all(),[
            'title'        => 'nullable|string|max:80',
            'description'  => 'nullable|max:500',
            'author'       => 'nullable|max:30',
            'photo'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024', //This Time No required Image
        ]);

        if($validator->fails())
        {
            session()->flash('type','danger'); 
            session()->flash('message_ERROR','ERROR !! ');
            session()->flash('message_text',' Please Try Again');

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $photoGallery              = PhotoGallery::find($id);
        $photoGallery->title       = $request->title;
        $photoGallery->description = $request->description;
        $photoGallery->author      = $request->author;
        $photoGallery->type        = $request->type;

        if ($request->hasFile('photo')) 
        {
            if (File::exists(public_path().$photoGallery->photo)) //delete previous image from storage
            {  
                File::delete(public_path().$photoGallery->photo);
            }

           // --- Image Intervention Start ---
            $file           = $request->file('photo');
            $imageName      = time().'.'.$file->getClientOriginalExtension();
            $directory      = '/admin/images/photo_gallery/';
            $imageUrl       = $directory.$imageName;
            $upload_path    = public_path().$imageUrl;
            Image::make($file)->resize(1900,700)->save($upload_path);
            
            // --- Image Intervention End ---

            $photoGallery->photo = $imageUrl;
        }

        $photoGallery->update();

        session()->flash('type','success');
        session()->flash('message','Photo Updated Successfully.');
        
        return redirect()->back();
    }



    public function photo_delete($id)
    {
        $photoGallery = PhotoGallery::find($id);

        if (File::exists(public_path().$photoGallery->photo)) //delete previous image from storage
        {  
            File::delete(public_path().$photoGallery->photo);
        }

        $photoGallery->delete();

        session()->flash('type','success');
        session()->flash('message','Photo Deleted Successfully.');
        
        return redirect()->back();
    }

    public function photo_unpublished(Request $request, $id)
    {
        $PhotoGallery = PhotoGallery::find($id);
        $PhotoGallery->status   = 'unpublished';
        $PhotoGallery->update();

        return redirect()->back();
    }

    public function photo_published(Request $request, $id)
    {
        $PhotoGallery = PhotoGallery::find($id);
        $PhotoGallery->status   = 'published';
        $PhotoGallery->update();

        return redirect()->back();
    }
}

// --- For Multiple ----

        // if ($request->hasFile('photo')) 
        // {
        //     foreach ($request->file('photo') as $item) 
        //     {
        //         // --- Image Intervention Start ---

        //         // $file           = $item->file('photo');
        //         // $file           = $request->file('photo');
        //         $imageName      = time().'.'.$item->getClientOriginalExtension();
        //         $directory      = '/admin/images/museum/';
        //         $imageUrl       = $directory.$imageName;
        //         $upload_path     = public_path().$imageUrl;
        //         Image::make($item)->resize(300,300)->save($upload_path);

        //         // --- Image Intervention End ---

        //         $multiple_image            = new MultipleImage();
        //         $multiple_image->user_id   = Auth::user()->id; //Admin
        //         $multiple_image->museum_id = 1;
        //         $multiple_image->photo     = $imageUrl;
        //         $multiple_image->status     = 'Museum_Photo';
        //         $multiple_image->save();
        //     }
        // }