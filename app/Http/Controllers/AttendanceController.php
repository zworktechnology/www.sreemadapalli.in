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
        $data = Employee::where('soft_delete', '!=', 1)->where('salary_amount', '!=', '0')->get();

        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();
        $notificationdetails = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->where('delivery_date', '=', $today)->get();

        return view('pages.backend.attendence.index', compact('data', 'today', 'notificationcount', 'notificationdetails'));
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

            $Attendance = new Attendance();
            $Attendance->date = $request->get('attendence_date');
            $Attendance->month = $request->get('attendence_month');
            $Attendance->employee_id = $employee_id;
            $Attendance->attendence_status = $request->attendence_status[$key];
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
