<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Redirect,Response,Auth;
use Session;

use Image;
use File;
use DB;
// use Illuminate\Support\Facades\Session;

Session_start();

class UserController extends Controller
{
    public function userRegistration(Request $request)
    {
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|unique:users',
            'phone'     => 'required',
            'address'   => 'required',
            'password'  => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'photo'     => 'required|image|max:10240',
        ]);

        if($validator->fails())
        {
            session()->flash('error','');
            session()->flash('message','Something wrong . Please try again');

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name    = $request->name;
        $user->email   = $request->email;
        $user->phone   = $request->phone;
        $user->address = $request->address;
        $user->password= Hash::make($request->password);
        $user->role    = 'user' ;

        // --- Image Intervention Start ---

        $file           = $request->file('photo');
        $imageName      = time().'.'.$file->getClientOriginalExtension();
        $directory      = '/public/images/user/';
        $imageUrl       = $directory.$imageName;
        $upload_path       = public_path().$imageUrl;
        Image::make($file)->resize(300,300)->save($upload_path);
        
        // --- Image Intervention End ---

        $user->photo = $imageUrl;
        $user->save();

        session()->flash('success','');
        session()->flash('message','Registration Successful.');
        
        return redirect()->back();
    }

    
    
    public function userLogin(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'email'     => 'required|string|email',
            'password'  => 'required',
        ]);

        if($validator->fails())
        {
            session()->flash('error','');
            session()->flash('message','Something wrong. Please try again');

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            
            session()->flash('success','');
            session()->flash('message','You are now logged in.');
            return redirect()->back();
        }

        session()->flash('error','');
        session()->flash('message','Emalil or Password does not match.');
        return redirect()->back();
    }

    public function userLogout() 
    {
        Session::flush();
        Auth::logout();
        // return Redirect('login');
        return redirect()->route('home');
    }


}
