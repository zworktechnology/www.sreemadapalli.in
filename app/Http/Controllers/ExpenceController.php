<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Expence;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExpenceController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Expence::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $employee = Employee::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();

        return view('pages.backend.expence.index', compact('data', 'today', 'employee'));
    }

    public function store(Request $request)
    {
        $data = new Expence();

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->employee_id = $request->get('employee_id');
        $data->note = $request->get('note');

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
}

