<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Auth;
use App\Imports\ExcelImport;
use App\Exports\ExcelExport;
use Maatwebsite\Excel\Facades\Excel;


class VisitorController extends Controller
{
    public function visitor_create()
    {
        return view('admin.pages.visitor.visitor-create');
    }

    public function visitor_save(Request $request)
    {
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'visitor_name'      => 'required|min:3|max:40',
            'visitor_email'     => 'email|nullable|unique:visitors',
            'visitor_phone'     => 'required|min:11|max:11|unique:visitors',
            'visitor_address'   => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $visitor                  = new Visitor();
        $visitor->visitor_name    = $request->visitor_name;
        $visitor->visitor_email   = $request->visitor_email;
        $visitor->visitor_phone   = $request->visitor_phone;
        $visitor->visitor_address = $request->visitor_address;
        $visitor->save(); //First Saved Data then Update visitor_id_no


        // ----------- Visitor Id No Generate Start --------
       
        $last_data  = Visitor::latest()->first(); //Catch th last row's data
        
        $timestamp = strtotime($last_data->created_at); // the 'created_at' will make full string formate
        
        $year = date('y', $timestamp); //take the last digit of year (like 20). if you want to take full length like 2020 type 'Y' replace of the 'y'
        $month = date('m', $timestamp); // number of month like-  April = 04

        $year_month = 'MV-'.$year.$month.$last_data->id; // "MV-" = Just a String || "$year" = 20 (last digit of year) || "$month" = number of month like-  April = 04 || "$data->id" the id of database row which you saved 

        $last_data->visitor_id_no = $year_month; // Example:  'MV-200401' || MV- string || 20=Year || 04=April || 01 = id of database (row) 
        $last_data->update();

        // ----------- Visitor Id No Generate End --------


        session()->flash('type','success');
        session()->flash('message','Visitor Added Successful.');
        
        return redirect()->back();
    }

    public function visitor_list()
    {
        $visitors = Visitor::orderBy('id','DESC')->get();

        return view('admin.pages.visitor.visitor-list',compact('visitors'));
    }

    public function visitor_update(Request $request,$id)
    {
        $visitor  = Visitor::find($id);

        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'visitor_name'      => 'required|min:3|max:20',
            'visitor_email'     => 'email|nullable|unique:visitors,visitor_email,'.$visitor->id,
            'visitor_phone'     => 'required|min:11|max:11|unique:visitors,visitor_phone,'.$visitor->id,
            // 'visitor_address'   => 'required',
        ]);

        if($validator->fails())
        {
            session()->flash('type','danger');
            session()->flash('message_ERROR','ERROR !! ');
            session()->flash('message_text',' Please Try Again');

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $visitor->visitor_name    = $request->visitor_name;
        $visitor->visitor_email   = $request->visitor_email;
        $visitor->visitor_phone   = $request->visitor_phone;
        $visitor->visitor_address = $request->visitor_address;
        $visitor->update();

        session()->flash('type','success');
        session()->flash('message','Visitor Updated Successful.');
        
        return redirect()->route('visitor-list');
    }

    public function visitor_delete($id)
    {
        $visitor  = Visitor::find($id);
        $visitor->delete();

        session()->flash('type','success');
        session()->flash('message','Visitor Deleted Successfully.');
        
        return redirect()->back();
    }

    
    
    // ===================== Excel File ==========================
    public function visitor_excel_import()
    {
        Excel::import(new ExcelImport, request()->file('file'));

        return back();
    }

    public function visitor_excel_export()
    {
        return Excel::download(new ExcelExport, 'visitor.xlsx');
    }

    
}
