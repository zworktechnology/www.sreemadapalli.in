<?php

namespace App\Http\Controllers;

use App\Models\AccountClose;
use Illuminate\Http\Request;
use App\Models\Outdoor;
use Carbon\Carbon;

class AccountCloseController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = AccountClose::  where('soft_delete', '!=', 1)->where('date', '=', $today)->get();
        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();

        return view('pages.backend.accountclose.index', compact('notificationcount', 'data', 'today'));
    }

    public function dailyfilter(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');
        $daily_date = $request->get('date');
        $data = AccountClose::where('soft_delete', '!=', 1)->where('date', '=', $daily_date)->get();
        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();

        return view('pages.backend.accountclose.dailyfilter', compact('notificationcount', 'data', 'daily_date'));
    }

    public function store(Request $request)
    {
        $data = new AccountClose();

        $data->date = $request->get('date');
        $data->case_on_hand = $request->get('case_on_hand');
        $data->g_pay = $request->get('g_pay');
        $data->g_pay_business = $request->get('g_pay_business');
        $data->phone_pay = $request->get('phone_pay');
        $data->card = $request->get('card');
        $data->other_case = $request->get('other_case');
        $data->sales_amount = $request->get('sales_amount');

        $data->save();

        return redirect()->route('home')->with('add', 'Successful addition of a new accountclose record !');
    }

    public function edit($id)
    {
        $data = AccountClose::findOrFail($id);
        $today = Carbon::now()->format('Y-m-d');

        return view('pages.backend.accountclose.edit', compact('data', 'today'));
    }

    public function update(Request $request, $id)
    {
        $data = AccountClose::findOrFail($id);

        $data->date = $request->get('date');
        $data->case_on_hand = $request->get('case_on_hand');
        $data->g_pay = $request->get('g_pay');
        $data->g_pay_business = $request->get('g_pay_business');
        $data->phone_pay = $request->get('phone_pay');
        $data->card = $request->get('card');
        $data->other_case = $request->get('other_case');
        $data->sales_amount = $request->get('sales_amount');
        $data->update();

        return redirect()->route('accountclose.index')->with('update', 'AccountClose record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = AccountClose::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('accountclose.index')->with('soft_destroy', 'Successfully deleted the accountclose record !');
    }

    public function destroy($id)
    {
        $data = AccountClose::findOrFail($id);

        $data->delete();

        return redirect()->route('accountclose.index')->with('destroy', 'Successfully erased the accountclose record !');
    }
}
