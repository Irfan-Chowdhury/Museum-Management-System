<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisitEntry;
use DB;

class ChartController extends Controller
{
    public function chartVisitEntry()
    {
        $data = [];

        for ($i=1; $i <=12 ; $i++) //Update Later For Year Select
        { 
            $visit_entries = DB::table('visit_entries')
                        ->whereMonth('created_at', $i)
                        ->get();

            $data[$i] = $visit_entries;
        }
        
        //return $data;

        return view('admin.pages.chart.chart-visit-entry',compact('data'));
    }
}



//How to select all rows for a certain month (or day, year or time), using Eloquent
//https://webdevetc.com/programming-tricks/laravel/laravel-eloquent/how-to-select-all-rows-for-a-certain-month-or-day-year-or-time-using-eloquent


//Carbon Datetime
//https://scotch.io/tutorials/easier-datetime-in-laravel-and-php-with-carbon


// Bar-Chart & others type
// https://developers.google.com/chart/interactive/docs/gallery/columnchart