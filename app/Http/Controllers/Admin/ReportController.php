<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisitEntry;
use PDF;
use DB;

class ReportController extends Controller
{
    //=============== View visit entry between dates =================

    public function visitEntryBetweenDates()
    {
        return view('admin.pages.report.visit-entry-between-dates');
    }

    public function visitEntryBetweenDatesShow(Request $request)
    {
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'from_date' => 'required',
            'to_date'   => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $from = date($request->from_date);
        $to   = date($request->to_date); 

        // $data = VisitEntry::where('created_at','>=', $from)
        //                 ->where('created_at','<=', $to)
        //                 ->get();

        $visit_entries = VisitEntry::with('visitor','user')
                                    // ->whereBetween('created_at', [$from, $to])
                                    ->whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])
                                    ->get();


        
        // $first_date    = VisitEntry::select('created_at')
        //                             ->whereDate('created_at','=',$from)
        //                             ->first();

        // $last_date     = VisitEntry::select('created_at')
        //                             ->whereDate('created_at','=',$to)
        //                             ->latest()
        //                             ->first();


        return view('admin.pages.report.visit-entry-between-dates',compact('visit_entries','from','to'));
    }

    public function downloadPDFVisitEntry(Request $request)
    {
        $from = date($request->from_date);
        $to   = date($request->to_date);


        $visit_entries = VisitEntry::with('visitor','user')
                        ->whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])
                        ->get();


        // return view('admin.pages.report.visit-entry-PDF',compact('visit_entries','from','to'));
        $pdf = PDF::loadView('admin.pages.report.visit-entry-PDF', compact('visit_entries','from','to'));
        return $pdf->download('visit-entry-info.pdf');
    }


    //================= Invoice ===================
    
    public function invoiceBetweenDates()
    {
        return view('admin.pages.report.invoice-between-dates');
    }

    public function invoiceBetweenDatesShow(Request $request)
    {
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'from_date' => 'required',
            'to_date'   => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $from = date($request->from_date);
        $to   = date($request->to_date);


        $visit_entries = VisitEntry::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])
                                    ->get();

        $total_ticket  = DB::table('visit_entries')
                        ->whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])
                        ->get()
                        ->sum("quantity");
        
        //return $total_ticket;
        return view('admin.pages.report.invoice-between-dates',compact('visit_entries','total_ticket','from','to'));
    }

    public function downloadPDFInvoiceBetweenDates(Request $request)
    {
        $from = date($request->from_date);
        $to   = date($request->to_date);

        $visit_entries = VisitEntry::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])
                                    ->get();

        $total_ticket  = DB::table('visit_entries')
                        ->whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])
                        ->get()
                        ->sum("quantity");

        // return view('admin.pages.report.invoice-PDF',compact('visit_entries','total_ticket','from','to'));
        $pdf = PDF::loadView('admin.pages.report.invoice-PDF', compact('visit_entries','total_ticket','from','to'));
        return $pdf->download('invoice.pdf');
    }

}

// =================== PDF Generate ===================

//composer require barryvdh/laravel-dompdf

// 'providers' => [
//     ....
//     Barryvdh\DomPDF\ServiceProvider::class,
// ],
// 'aliases' => [
//     ....
//     'PDF' => Barryvdh\DomPDF\Facade::class,
// ],

// use PDF;

// https://appdividend.com/2019/09/13/laravel-6-generate-pdf-from-view-example-tutorial-from-scratch/