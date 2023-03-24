<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Expence;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class ExpenceController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Expence::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $total = Expence::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('amount');
        $employee = Employee::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $employee_mobile = Employee::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $total_pending = Expence::where('date', '=', $today)->where('status', '=', 'Pending')->where('soft_delete', '!=', 1)->sum('amount');
        $total_paid = Expence::where('date', '=', $today)->where('status', '=', 'Paid')->where('soft_delete', '!=', 1)->sum('amount');


        return view('pages.backend.expence.index', compact('data', 'today', 'employee', 'total', 'employee_mobile', 'total_pending', 'total_paid'));
    }

    public function dailyfilter(Request $request)
    {
        $daily_date = $request->get('date');
        $expense_data = Expence::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->get();
        $total = Expence::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->sum('amount');
        $total_pending = Expence::where('date', '=', $daily_date)->where('status', '=', 'Pending')->where('soft_delete', '!=', 1)->sum('amount');
        $total_paid = Expence::where('date', '=', $daily_date)->where('status', '=', 'Paid')->where('soft_delete', '!=', 1)->sum('amount');

        return view('pages.backend.expence.dailyfilter', compact('expense_data', 'total', 'daily_date', 'total_pending', 'total_paid'));
    }

    public function store(Request $request)
    {
        $data = new Expence();

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->employee_id = $request->get('employee_id');
        $data->note = $request->get('note');
        $data->status = $request->get('status');

        $data->save();

        return redirect()->route('expence.index')->with('add', 'Successful addition of a new expence record !');
    }

    public function edit($id)
    {
        $data = Expence::findOrFail($id);
        $employee = Employee::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.expence.edit', compact('data', 'employee'));
    }

    public function update(Request $request, $id)
    {
        $data = Expence::findOrFail($id);

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->employee_id = $request->get('employee_id');
        $data->note = $request->get('note');
        $data->status = $request->get('status');

        $data->update();

        return redirect()->route('expence.index')->with('update', 'Expence record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Expence::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('expence.index')->with('soft_destroy', 'Successfully deleted the expence record !');
    }

    public function destroy($id)
    {
        $data = Expence::findOrFail($id);

        $data->delete();

        return redirect()->route('expence.index')->with('destroy', 'Successfully erased the expence record !');
    }

    public function pdfexportexpence()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Expence::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $total = Expence::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('amount');
        $employee = Employee::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $employee_mobile = Employee::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $total_pending = Expence::where('date', '=', $today)->where('status', '=', 'Pending')->where('soft_delete', '!=', 1)->sum('amount');
        $total_paid = Expence::where('date', '=', $today)->where('status', '=', 'Paid')->where('soft_delete', '!=', 1)->sum('amount');


        $pdf = Pdf::loadView('pages.backend.expence.pdfexport', [
            'today' => $today,
            'total_pending' => $total_pending,
            'total_paid' => $total_paid,
            'total' => $total,
            'data' => $data,
        ]);

        return $pdf->download('expence_pdfexport.pdf');
    }

    public function pdfexportexpencebydate(Request $request)
    {
        $today = $request->get('date');
        $data = Expence::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $total = Expence::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('amount');
        $employee = Employee::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $employee_mobile = Employee::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $total_pending = Expence::where('date', '=', $today)->where('status', '=', 'Pending')->where('soft_delete', '!=', 1)->sum('amount');
        $total_paid = Expence::where('date', '=', $today)->where('status', '=', 'Paid')->where('soft_delete', '!=', 1)->sum('amount');


        $pdf = Pdf::loadView('pages.backend.expence.pdfexport', [
            'today' => $today,
            'total_pending' => $total_pending,
            'total_paid' => $total_paid,
            'total' => $total,
            'data' => $data,
        ]);

        return $pdf->download('expence_pdfexport_bydate.pdf');
    }


}

