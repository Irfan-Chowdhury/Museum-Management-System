<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MultipleImage;
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
}
