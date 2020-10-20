<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Day;
use App\Models\Schedule;
use Auth;
class ScheduleController extends Controller
{
    public function schedule_create()
    {
        $schedule = Schedule::all(); //for disable if 7 Days are setup
        
        return view('admin.pages.schedule.schedule-create',compact('schedule'));
    }

    public function schedule_save(Request $request)
    {
        // return $request->all();
        //--------------------------- validation -----------------------------
        $validator= Validator::make($request->all(),[
            'day'       => 'required|unique:schedules',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $schedule                = new Schedule();
        $schedule->day           = $request->day; 
        $schedule->starting_time = $request->starting_time; 
        $schedule->ending_time   = $request->ending_time; 
        $schedule->half_day      = $request->half_day; 
        $schedule->holiday       = $request->holiday; 
        $schedule->save();

        session()->flash('type','success');
        session()->flash('message','Schedule Added Successfully.');
        
        return redirect()->back();
    }

    public function schedule_manage()
    {
        $schedule = Schedule::all();

        return view('admin.pages.schedule.schedule-manage',compact('schedule'));
    }

    public function schedule_edit($id)
    {
        $all_days = Schedule::all();

        $specific_schedule = Schedule::find($id);
        return view('admin.pages.schedule.schedule-edit',compact('all_days','specific_schedule'));
    }

    public function schedule_update(Request $request, $id)
    {
        $specific_schedule = Schedule::find($id);
        $specific_schedule->day           = $request->day; 
        $specific_schedule->starting_time = $request->starting_time; 
        $specific_schedule->ending_time   = $request->ending_time; 
        $specific_schedule->half_day      = $request->half_day; 
        $specific_schedule->holiday       = $request->holiday; 
        $specific_schedule->update();

        session()->flash('type','success');
        session()->flash('message','Schedule Updated Successfully.');
        
        return redirect()->route('schedule-manage');
    }
}
