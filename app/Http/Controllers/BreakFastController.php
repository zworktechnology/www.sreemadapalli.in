<?php

namespace App\Http\Controllers;

use App\Models\BreakFast;
use App\Models\Customer;
use App\Models\Deliveryboy;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BreakFastController extends Controller
{
    public function edit($id)
    {
        $data = BreakFast::findOrFail($id);
        $customer = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $deliveryboy = Deliveryboy::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();

        return view('pages.backend.sales.breakfast.edit', compact('data', 'customer', 'deliveryboy'));
    }

    public function update(Request $request, $id)
    {
        $data = BreakFast::findOrFail($id);

        $data->date = $request->get('date');
        $data->invoice_no = $request->get('invoice_no');
        $data->delivery_boy_id = $request->get('delivery_boy_id');
        $data->bill_amount = $request->get('bill_amount');
        $data->delivery_amount = $request->get('delivery_amount');
        $data->payment_amount = $request->get('payment_amount');
        $data->payment_method = $request->get('payment_method');
        $data->wallet_status = $request->get('wallet_status');
        $data->customer_id = $request->get('customer_id');
        $data->payment_status = $request->get('payment_status');

        $data->update();

        return redirect()->route('sales.index')->with('update', 'BreakFast record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = BreakFast::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('sales.index')->with('soft_destroy', 'Successfully deleted the breakfast record !');
    }

    public function destroy($id)
    {
        $data = BreakFast::findOrFail($id);

        $data->delete();

        return redirect()->route('sales.index')->with('destroy', 'Successfully erased the breakfast record !');
    }



   
}
