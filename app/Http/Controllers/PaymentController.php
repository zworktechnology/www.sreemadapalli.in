<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');
        $data = Payment::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $customer = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $customer_mobile = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();

        return view('pages.backend.payment.index', compact('data', 'today', 'customer', 'customer_mobile'));
    }



    public function dailyfilter(Request $request)
    {
        $daily_date = $request->get('daily_date');

        $Payment_data = Payment::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->get();



        return view('pages.backend.payment.dailyfilter', compact('Payment_data'));
    }






    public function store(Request $request)
    {
        $data = new Payment();

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->customer_id = $request->get('customer_id');

        $data->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $data = Payment::findOrFail($id);
        $customer = Customer::where('soft_delete', '!=', 1)->get();

        return view('pages.backend.payment.edit', compact('data', 'customer'));
    }

    public function update(Request $request, $id)
    {
        $data = Payment::findOrFail($id);

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->customer_id = $request->get('customer_id');

        $data->update();

        return redirect()->route('payment.index')->with('update', 'Payment record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Payment::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('payment.index')->with('soft_destroy', 'Successfully deleted the payment record !');
    }

    public function destroy($id)
    {
        $data = Payment::findOrFail($id);

        $data->delete();

        return redirect()->route('payment.index')->with('destroy', 'Successfully erased the payment record !');
    }



}
