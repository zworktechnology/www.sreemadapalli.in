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

    public function present(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');

        $data = new Attendance();

        $data->date = $today;
        $data->a_status = $request->get('a_status');
        $data->employee_id = $request->get('employee_id');

        if ($request->get('a_status') == 1) {

            $wdata = new Expence();

            $wdata->date = $today;
            $wdata->amount = $request->get('amount');
            $wdata->employee_id = $request->get('employee_id');
            $wdata->note = 'No';
            $wdata->status = $request->get('status');

            $wdata->save();
        }

        $data->save();

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
