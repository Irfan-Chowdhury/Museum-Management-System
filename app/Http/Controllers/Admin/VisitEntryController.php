<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisitEntry;
use App\Models\Visitor;
use App\Models\User;
use Auth;

class VisitEntryController extends Controller
{
    public function visitor_entry_create()
    {
        $visitors = Visitor::all();
        $users    = User::all();

        return view('admin.pages.visit_entry.visit-entry-create',compact('visitors','users'));
    }

    public function visit_entry_save(Request $request)
    {
        $visitor      = new Visitor();
        $visit_entry  = new VisitEntry();  


        if ($request->visitor_name || $request->visitor_email || $request->visitor_phone || $request->visitor_address)
        {
            if ($request->visitor_id || $request->user_id)
            {
                session()->flash('type','danger');
                session()->flash('message_ERROR','ERROR !! ');
                session()->flash('message_text',' Please input data in correct way');
                return redirect()->back();
            }
        }

        if ($request->visitor_name && $request->visitor_phone && $request->visitor_address) 
        {
                //--------------------------- validation -----------------------------
                $validator= Validator::make($request->all(),[
                    'visitor_name'      => 'min:3|string|max:40',
                    'visitor_email'     => 'email|unique:visitors',
                    'visitor_phone'     => 'min:11|max:11|unique:visitors',
                ]);

                if($validator->fails())
                {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
           
                $visitor->user_id = Auth::user()->id;
                $visitor->visitor_name    = $request->visitor_name;
                $visitor->visitor_email   = $request->visitor_email;
                $visitor->visitor_phone   = $request->visitor_phone;
                $visitor->visitor_address = $request->visitor_address;
                $visitor->save();
    
                // ----------- Visitor Id No Generate Start --------
                
                $last_data  = Visitor::latest()->first(); //Catch th last row's data
                        
                $timestamp = strtotime($last_data->created_at); // the 'created_at' will make full string formate
    
                $year = date('y', $timestamp); //take the last digit of year (like 20). if you want to take full length like 2020 type 'Y' replace of the 'y'
                $month = date('m', $timestamp); // number of month like-  April = 04
    
                $year_month = 'MV-'.$year.$month.$last_data->id; // "MV-" = Just a String || "$year" = 20 (last digit of year) || "$month" = number of month like-  April = 04 || "$data->id" the id of database row which you saved 
    
                $last_data->visitor_id_no = $year_month; // Example:  'MV-200401' || MV- string || 20=Year || 04=April || 01 = id of database (row) 
                $last_data->update();
    
                // ----------- Visitor Id No Generate End --------
    
                $visit_entry->visitor_id = $last_data->id;                
        }
        elseif ($request->visitor_id) 
        {
            if ($request->user_id) 
            {
                session()->flash('type','danger');
                session()->flash('message_ERROR','ERROR !! ');
                session()->flash('message_text',' Please input data in correct way');
                return redirect()->back();
            }
            else 
            {
                $visit_entry->visitor_id = $request->visitor_id;
            }
        }
        elseif ($request->user_id) 
        {
            $visit_entry->user_id = $request->user_id;
            
        }
        else 
        {
            session()->flash('type','danger');
            session()->flash('message_ERROR','ERROR !! ');
            session()->flash('message_text',' Please input data in correct way');

            return redirect()->back();
        }

        $visit_entry->quantity   = $request->quantity;
        $visit_entry->total_taka = $request->quantity * 10; // Per Head - 10 Tk
        $visit_entry->save();

        session()->flash('type','success');
        session()->flash('message','Entry Added Successfully.');

        return redirect()->route('visit-entry-list');
    }

    public  function visit_entry_list()
    {

        $visit_entries = VisitEntry::with('visitor','user')->orderBy('id','DESC')->get();
       
        // return $visit_entries;

       return view('admin.pages.visit_entry.visit-entry-list',compact('visit_entries'));
    }

    public function visit_entry_delete($id)
    {
        $visit_entry = VisitEntry::find($id);

        $visit_entry->delete();

        session()->flash('type','success');
        session()->flash('message','Visit Entry Deleted Successfully.');

        return redirect()->back();
    }
}
