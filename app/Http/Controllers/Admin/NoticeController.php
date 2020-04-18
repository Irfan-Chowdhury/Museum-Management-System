<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Notice;
use Auth;
use Image;
use File;
class NoticeController extends Controller
{
    public function notice_create()
    {
        return view('admin.pages.notice.notice-create');
    }

    public function notice_save(Request $request)
    {
        //return $request->all();
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'title'       => 'required|unique:notices|max:100',
            'description' => 'required',
            'photo'       => 'image|max:1024',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $notice              = new Notice();
        $notice->user_id     = Auth::user()->id;
        $notice->title       = $request->title;
        $notice->description = $request->description;


        if ($request->hasFile('photo')) 
        {
           // --- Image Intervention Start ---
            $file           = $request->file('photo');
            $imageName      = time().'.'.$file->getClientOriginalExtension();
            $directory      = '/admin/images/notice/';
            $imageUrl       = $directory.$imageName;
            $upload_path     = public_path().$imageUrl;
            // $upload_path       = public_path($imageUrl); //Move the Product Image into the required folder
            Image::make($file)->resize(870,350)->save($upload_path);
            
            // --- Image Intervention End ---

            $notice->photo = $imageUrl;
        }
        
        $notice->save();

        session()->flash('type','success');
        session()->flash('message','Notice Added Successful.');
        
        return redirect()->back();
    }

    public function notice_list()
    {
        $notices = Notice::all();

        return view('admin.pages.notice.notice-list',compact('notices'));
    }

    public function notice_edit($id)
    {   
        $notice = Notice::find($id);

        return view('admin.pages.notice.notice-edit',compact('notice'));
    }

    public function notice_update(Request $request,$id)
    {
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'title'       => 'required|max:100',
            'description' => 'required',
            'photo'       => 'image|max:1024',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $notice              = Notice::find($id);
        $notice->user_id     = Auth::user()->id;
        $notice->title       = $request->title;
        $notice->description = $request->description;
        // $notice->status      = $request->status;

        // if ($request->photo!=$post->photo) 
        if ($request->hasFile('photo')) 
        {
            if (File::exists(public_path().$notice->photo)) //delete previous image from storage
            {  
                File::delete(public_path().$notice->photo);
            }
            
            // --- Image Intervention Start ---
            $file           = $request->file('photo');
            $imageName      = time().'.'.$file->getClientOriginalExtension();
            $directory      = '/admin/images/notice/';
            $imageUrl       = $directory.$imageName;
            $upload_path    = public_path().$imageUrl;
            // $upload_path       = public_path($imageUrl); //Move the Product Image into the required folder
            Image::make($file)->resize(870,350)->save($upload_path);
            
            // --- Image Intervention End ---
            
            $notice->photo   = $imageUrl;            
        }

        $notice->update();

        session()->flash('type','success');
        session()->flash('message','Notice Updated Successfully.');
        
        return redirect()->route('notice-list');
    }

    public function notice_delete($id)
    {
        $notice = Notice::find($id);

        if (File::exists(public_path().$notice->photo)) //delete previous image from storage
        {  
            File::delete(public_path().$notice->photo);
        }

        $notice->delete();
        session()->flash('type','success');
        session()->flash('message','Notice Deleted Successfully.');
        
        return redirect()->back();
    }

    public function notice_unpublished(Request $request, $id)
    {
        $notice = Notice::find($id);
        $notice->status   = 'unpublished';
        $notice->update();

        return redirect()->back();
    }

    public function notice_published(Request $request, $id)
    {
        $notice = Notice::find($id);
        $notice->status   = 'published';
        $notice->update();

        return redirect()->back();
    }
}
