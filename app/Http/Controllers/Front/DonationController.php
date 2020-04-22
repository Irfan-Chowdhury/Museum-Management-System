<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Donation;
use App\Models\DonationImage;
use Image;
use File;
use Auth;

class DonationController extends Controller
{
    public function donation_create()
    {
        return view('public.pages.user.donation.donation-create');
    }

    public function donation_save(Request $request)
    {
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'item_name'      => 'required|string|min:3|max:50',
            'description'    => 'required',
            'donation_image' => 'required|max:1024',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $donation = new Donation();
        $donation->user_id     = Auth::user()->id;
        $donation->item_name   = $request->item_name;
        $donation->description = $request->description;
        $donation->save();

        //Single Or Multiple Image
        if ($request->hasFile('donation_image')) 
        {
            foreach ($request->donation_image as $image) 
            {
                // $img = $image->getClientOriginalName(); //Way-1
                // $img   = time(). '.' .$image->getClientOriginalExtension(); //Way-2
                $img   = Str::random(10). '.' .$image->getClientOriginalExtension();
    
                //Move the Product Image into the required folder
                $location = public_path('public/images/donation/'.$img);
                Image::make($image)->resize(300,300)->save($location);

    
                //create the productImage Model
                $donation_image = new DonationImage;
    
                //Insert the data inside the product_image Table [product id, image name]
                $donation_image->donation_id = $donation->id;
                $donation_image->photo       = $img;
                $donation_image->save();
            }
        }

        session()->flash('message','Donation Submitted Succesfully.');
        return redirect()->back();
    }

    public function donation_list()
    {
        // $donations = Donation::where('user_id','=',Auth::user()->id)->get();
        $donations = Donation::where('user_id','=',Auth::user()->id)
                            ->orderBy('id','DESC')
                            ->get();

        return view('public.pages.user.donation.donation-list',compact('donations'));
    }


    // ========================== EDIT Part Start ========================

    public function donation_edit($id)
    {
        $donation  = Donation::find($id);

        $donation_images = DonationImage::where('donation_id',$id)->get();

        return view('public.pages.user.donation.donation-edit',compact('donation','donation_images'));
    }

    public function donation_update(Request $request, $id)
    {
        $validator= Validator::make($request->all(),[
            'item_name'      => 'required|string|min:3|max:50',
            'description'    => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $donation  = Donation::find($id);

        $donation->item_name   = $request->item_name;
        $donation->description = $request->description;
        $donation->update();

        session()->flash('message','Data Updated Succesfully.');
        return redirect()->back();
    }


    //For Donation Image Handle

    //Image Delete - one by one
    public function donation_image_delete($id)
    {
        $donation_image  = DonationImage::find($id);


        if (File::exists(public_path().'/public/images/donation/'.$donation_image->photo)) //delete previous image from storage
        {  
            File::delete(public_path().'/public/images/donation/'.$donation_image->photo);
        }
        
        $donation_image->delete();

        session()->flash('message',' Image Deleted Succesfully.');
        return redirect()->back();
    }

    //New Image Add
    public function donation_image_save(Request $request,$id)
    {
        $validator= Validator::make($request->all(),[
            'donation_image' => 'max:1024',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        //Single Or Multiple Image
        if ($request->hasFile('donation_image')) 
        {
            foreach ($request->donation_image as $image) 
            {
                // $img = $image->getClientOriginalName(); //Way-1
                // $img   = time(). '.' .$image->getClientOriginalExtension(); //Way-2
                $img   = Str::random(10). '.' .$image->getClientOriginalExtension();
    
                //Move the Product Image into the required folder
                $location = public_path('public/images/donation/'.$img);
                Image::make($image)->resize(300,300)->save($location);

    
                //create the productImage Model
                $donation_image = new DonationImage;
    
                //Insert the data inside the product_image Table [product id, image name]
                $donation_image->donation_id = $id; //This is Donation's  Id
                $donation_image->photo       = $img;
                $donation_image->save();
            }
        }

        session()->flash('message',' Image Added Succesfully.');
        return redirect()->back();
    }

    // ========================== EDIT Part End ========================




    //This is Delete All Data & Image together from donation-list by one click
    public function donation_delete($id)
    {
        //First Delete Data
        $donation         = Donation::find($id);
        $donation->delete();

        //2nd Delete Image From Database & File Storage
        $donation_image_id = DonationImage::where('donation_id',$id)->get();
                                        
        foreach ($donation_image_id as $imageId) 
        {
            $donation_image = DonationImage::find($imageId->id);

            if (File::exists(public_path().'/public/images/donation/'.$donation_image->photo)) //delete previous image from storage
            {  
                File::delete(public_path().'/public/images/donation/'.$donation_image->photo);
            }

            $donation_image->delete(); 
        }

        session()->flash('message','Data Deleted Succesfully.');
        return redirect()->back();
    }


}
