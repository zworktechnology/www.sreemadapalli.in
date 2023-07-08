<?php

namespace App\Http\Controllers;

use App\Models\AccountOpen;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Outdoor;
use Carbon\Carbon;

class AccountOpenController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();
        $data = AccountOpen::where('soft_delete', '!=', 1)->where('date', '=', $today)->get();
        $total = AccountOpen::where('soft_delete', '!=', 1)->where('date', '=', $today)->sum('amount');
        $employee = Employee::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();

        return view('pages.backend.accountopen.index', compact('notificationcount', 'data', 'today', 'total', 'employee'));
    }

    public function dailyfilter(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');
        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();
        $daily_date = $request->get('date');
        $data = AccountOpen::where('soft_delete', '!=', 1)->where('date', '=', $daily_date)->get();
        $total = AccountOpen::where('soft_delete', '!=', 1)->where('date', '=', $daily_date)->sum('amount');

        return view('pages.backend.accountopen.dailyfilter', compact('notificationcount', 'data', 'daily_date', 'total'));
    }

    public function store(Request $request)
    {
        $data = new AccountOpen();

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->emp_id = $request->get('emp_id');
        $data->note = $request->get('note');

        $data->save();

        return redirect()->route('home')->with('add', 'Successful addition of a new accountopen record !');
    }

    public function edit($id)
    {
        $data = AccountOpen::findOrFail($id);
        $employee = Employee::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();

        return view('pages.backend.accountopen.edit', compact('data', 'employee'));
    }

    public function update(Request $request, $id)
    {
        $data = AccountOpen::findOrFail($id);

        $data->date = $request->get('date');
        $data->emp_id = $request->get('emp_id');
        $data->amount = $request->get('amount');
        $data->note = $request->get('note');

        $data->update();

        return redirect()->route('accountopen.index')->with('update', 'AccountOpen record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = AccountOpen::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('accountopen.index')->with('soft_destroy', 'Successfully deleted the accountopen record !');
    }

    public function destroy($id)
    {
        $data = AccountOpen::findOrFail($id);

        $data->delete();

        return redirect()->route('accountopen.index')->with('destroy', 'Successfully erased the accountopen record !');
    }
}
