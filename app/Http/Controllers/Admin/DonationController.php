<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\DonationImage;

class DonationController extends Controller
{
    public function all_donation()
    {
        
        $donations = Donation::with('user')
                            ->orderBy('id','DESC')
                            ->get();

        $donation_images = DonationImage::all();

        return view('admin.pages.donation.all-donation',compact('donations','donation_images'));
    }

    public function donation_reject($id)
    {
        $donation = Donation::find($id);

        $donation->status = "reject";
        $donation->update();

        return redirect()->back();
    }

    public function donation_accept($id)
    {
        $donation = Donation::find($id);

        $donation->status = "accept";
        $donation->update();

        return redirect()->back();
    }
}
