<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Image;
use File;
class AdminController extends Controller
{
    public function admin_create()
    {
        return view('admin.pages.admins.admin-create');
    }

    public function admin_save(Request $request)
    {
        //return $request->all();
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'name'      => 'required',
            'email'     => 'required|email',
            'phone'     => 'required',
            'address'   => 'required',
            'password'  => 'required|min:5',
            // 'image'     => 'required|image|max:10240',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin          = new User();
        $admin->name    = $request->name;
        $admin->email   = $request->email;
        $admin->phone   = $request->phone;
        $admin->address = $request->address;
        $admin->password= Hash::make($request->password);
        $admin->roll    = 'admin' ;
        
        // --- Image Intervention Start ---

        $file           = $request->file('photo');
        $imageName      = time().'.'.$file->getClientOriginalExtension();
        $directory      = '/admin/images/admins/';
        $imageUrl       = $directory.$imageName;
        $upload_path       = public_path().$imageUrl;
        // $upload_path       = public_path($imageUrl); //Move the Product Image into the required folder
        Image::make($file)->resize(300,300)->save($upload_path);
        
        // --- Image Intervention End ---


        $admin->photo = $imageUrl;
        $admin->save();

        session()->flash('type','success');
        session()->flash('message','Admin Added Successful.');
        
        return redirect()->back();
      


    }
}
