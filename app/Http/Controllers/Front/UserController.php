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
            session()->flash('error',''); //This line for Modal
            session()->flash('message','Something wrong . Please try again'); //This line for Modal

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


        // ----------- User Id No Generate Start --------

        $last_data  = User::latest()->first(); //Catch th last row's data

        $timestamp = strtotime($last_data->created_at); // the 'created_at' will make full string formate
        
        $year = date('y', $timestamp); //take the last digit of year (like 20). if you want to take full length like 2020 type 'Y' replace of the 'y'
        $month = date('m', $timestamp); // number of month like-  April = 04

        $year_month = 'MU-'.$year.$month.$last_data->id; // "MU-" = Just a String || "$year" = 20 (last digit of year) || "$month" = number of month like-  April = 04 || "$data->id" the id of database row which you saved || M=Museum, U=User

        $last_data->user_id_no = $year_month; // Example:  'MV-200401' || MV- string || 20=Year || 04=April || 01 = id of database (row) 
        $last_data->update();

        // ----------- User Id No Generate End --------


        session()->flash('success','');
        session()->flash('message','Registration Successful.');
        
        return redirect()->back();
    }

    
    
    public function userLogin(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'name'     => 'required|string|email',
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
            session()->flash('welcome','Welcome');
            session()->flash('message','You are logged in now.');
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


    public function userProfile()
    {
        $id = Auth::user()->id;

        $user = User::find($id);
        return view('public.pages.user.profile.user-profile',compact('user'));
    }

    public function userProfileEdit()
    {
        $id = Auth::user()->id;

        $user = User::find($id);
        return view('public.pages.user.profile.user-profile-edit',compact('user'));
    }


    public function userProfileUpdate(Request $request)
    {
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'name'      => 'required|string|max:255',
            'phone'     => 'required',
            'address'   => 'required',
            'photo'     => 'image|max:10240',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = Auth::user()->id;

        $user = User::find($id);

        $user->name    = $request->name;
        $user->phone   = $request->phone;
        $user->address = $request->address;

        if ($request->hasFile('photo')) 
        {
            if (File::exists(public_path().$user->photo)) //delete previous image from storage
            {  
                File::delete(public_path().$user->photo);
            }

           // --- Image Intervention Start ---
            $file           = $request->file('photo');
            $imageName      = time().'.'.$file->getClientOriginalExtension();
            $directory      = '/public/images/user/';
            $imageUrl       = $directory.$imageName;
            $upload_path     = public_path().$imageUrl;
            Image::make($file)->resize(300,300)->save($upload_path);
            
            // --- Image Intervention End ---

            $user->photo = $imageUrl;
        }

        $user->save();


        session()->flash('success_profile','');
        session()->flash('message','Profile Updated Successful.');
        
        return redirect()->back();
    }

    public function userPasswordChange()
    {
        return view('public.pages.user.password-change');
    }

    public function passwordChangeUpdate(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'old_password'          => 'required',
            'new_password'          => 'required|min:8',
            'password_confirmation' => 'required|same:new_password',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $id = Auth::user()->id;
        // $user = User::find($id);
        $user = Auth::user();
        
        if (Hash::check($request->old_password, $user->password)) //'$request->old_password' - user old password that has been entered on the form || '$user->password' - old password which have already stored in database
        {
            $user->password = Hash::make($request->new_password);
            $user->save();

            session()->flash('success_password','');
            session()->flash('message','Password Changed Successfully.');
            
            return redirect()->back();
        }
        else 
        {
            session()->flash('error_password','');
            session()->flash('message','Password does not match. Please try again');
            
            return redirect()->back();
        }
    }
}
