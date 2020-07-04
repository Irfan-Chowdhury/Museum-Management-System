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
            'email'     => 'required|email|unique:users',
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
        $admin->role    = 'admin' ;
        
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

    public function admin_list()
    {
        $admins = User::where('role','=','admin')->get();

        return view('admin.pages.admins.admin-list',compact('admins'));
    }

    public function admin_edit($id)
    {
        $admin = User::find($id);

        return view('admin.pages.admins.admin-edit',compact('admin'));

    }

    public function admin_update(Request $request,$id)
    {
         //--------------------------- validation -----------------------------
         $validator= Validator::make($request->all(),[
            'name'      => 'required',
            'email'     => 'required|email',
            'phone'     => 'required',
            'address'   => 'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin = User::find($id);

        
        // if ($request->photo!=$post->photo) 
        if ($request->hasFile('photo')) 
        {
            if (File::exists(public_path().$admin->photo)) //delete previous image from storage
            {  
                File::delete(public_path().$admin->photo);
            }
            
            // --- Image Intervention Start ---
            $file           = $request->file('photo');
            $imageName      = time().'.'.$file->getClientOriginalExtension();
            $directory      = '/admin/images/admins/';
            $imageUrl       = $directory.$imageName;
            $upload_path    = public_path().$imageUrl;
            // $upload_path       = public_path($imageUrl); //Move the Product Image into the required folder
            Image::make($file)->resize(300,300)->save($upload_path);
            
            // --- Image Intervention End ---
            
            $admin->photo   = $imageUrl;            
        }

        $admin->name    = $request->name;
        $admin->email   = $request->email;
        $admin->phone   = $request->phone;
        $admin->address = $request->address;
        
        $admin->update();

        session()->flash('type','success');
        session()->flash('message','Admin info updated successful.');
        
        return redirect()->route('admin-list');

        //return view('admin.pages.admins.admin-edit',compact('user'));

    }

    public function admin_delete($id)
    {
        $admin = User::find($id);

        if (File::exists(public_path().$admin->photo)) //delete previous image from storage
        {  
            File::delete(public_path().$admin->photo);
        }

        $admin->delete();
        session()->flash('type','success');
        session()->flash('message','Admin deleted successful.');
        
        return redirect()->back();
    }
}
