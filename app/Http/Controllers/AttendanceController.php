<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Expence;
use App\Models\Outdoor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Employee::where('soft_delete', '!=', 1)->get();

        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();
        $notificationdetails = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->where('delivery_date', '=', $today)->get();

        $time = strtotime($today);
        $current_month = date("F",$time);


        $month = date("m",strtotime($today));
        $year = date("Y",strtotime($today));

        $list=array();
        $monthdates = [];
        for($d=1; $d<=31; $d++)
        {
            $times = mktime(12, 0, 0, $month, $d, $year);          
            if (date('m', $times) == $month)   
                $list[] = date('d', $times);    
                $monthdates[] = date('Y-m-d', $times);
        }




        $attendence_Data = [];
        foreach (($monthdates) as $key => $monthdate_arr) {

            $employees = Employee::where('soft_delete', '!=', 1)->get();
            foreach ($employees as $key => $employees_arr) {
                $status = '';
                $attendencedata = Attendance::where('soft_delete', '!=', 1)->where('employee_id', '=', $employees_arr->id)->where('date', '=', $monthdate_arr)->first();
                if($attendencedata != ""){
                    if($attendencedata->attendence_status == 'Present'){
                        $status = 'P';
                    }else {
                        $status = 'A';
                    }
                }

                    

                $attendence_Data[] = array(
                    'employee' => $employees_arr->name,  
                    'empid' => $employees_arr->id,
                    'attendence_status' => $status,
                    'date' => date("d",strtotime($monthdate_arr))
                );

                
                
            }

            
        }
        //dd($attendence_Data);

        
        return view('pages.backend.attendence.index', compact('data', 'today', 'notificationcount', 'notificationdetails', 'current_month', 'list', 'attendence_Data', 'monthdates'));
    }


    public function create()
    {
        $today = Carbon::now()->format('Y-m-d');
        $timenow = Carbon::now()->format('H:i');
        $employees = Employee::where('soft_delete', '!=', 1)->get();
        $time = strtotime($today);
        $month = date("F",$time);
        return view('pages.backend.attendence.create', compact('today', 'employees', 'month', 'time', 'timenow'));
    }




    public function store(Request $request)
    {

        foreach ($request->get('employee_id') as $key => $employee_id) {

            $year = date("Y",strtotime($request->get('attendence_date')));

            $Attendance = new Attendance();
            $Attendance->date = $request->get('attendence_date');
            $Attendance->month = $request->get('attendence_month');
            $Attendance->year = $year;
            $Attendance->employee_id = $employee_id;
            $Attendance->attendence_status = $request->attendence_status[$employee_id];
            $Attendance->save();
        }

        return redirect()->route('attendence.index')->with('update', 'mark as present');
    }

    public function absent($id)
    {
        $data = Attendance::findOrFail($id);

        $data->a_status = 0;

        $data->update();

        return redirect()->route('attendence.index')->with('update', 'mark as absent');
    }

    public function delete($id)
    {
        $data = Attendance::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('attendence.index')->with('soft_destroy', 'Successfully deleted the attendence record !');
    }

    public function destroy($id)
    {
        $data = Outdoor::findOrFail($id);

        $data->delete();

        return redirect()->route('outdoor.index')->with('destroy', 'Successfully erased the outdoor record !');
    }
}
