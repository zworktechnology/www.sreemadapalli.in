<?php

namespace App\Http\Controllers;

use App\Models\BreakFast;
use App\Models\Customer;
use App\Models\Dinner;
use App\Models\Lunch;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        return view('pages.backend.customer.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Customer();

        $data->name = $request->get('name');
        $data->contact_number = $request->get('contact_number');
        $data->email_address = $request->get('email_address');
        $data->address = $request->get('address');

        $uni_id_gen = $request->name;
        $uni_id_gen_one = $uni_id_gen[0];
        $uni_id_gen_two = $uni_id_gen[1];
        $last_customer  = Customer::orderBy('created_at', 'desc')->first();

        if (isset($last_customer)) {
            $data->unique_id  = $uni_id_gen_one . $uni_id_gen_two . '00' . ($last_customer->id + 1);
        } else {
            $data->unique_id  = $uni_id_gen_one . $uni_id_gen_two . '001';
        }

        $data->save();

        return redirect()->route('customer.index')->with('add', 'Successful addition of a new customer !');
    }

    public function view($id)
    {
        $data = Customer::findOrFail($id);
        $breakfast_amount_pending = BreakFast::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_status', '=', 'Pending')->sum('bill_amount');
        $breakfast_amount_paid = BreakFast::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_status', '!=', 'Pending')->sum('bill_amount');
        $breakfast_total_amount = BreakFast::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->sum('bill_amount');

        $lunch_amount_pending = Lunch::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_status', '=', 'Pending')->sum('bill_amount');
        $lunch_amount_paid = Lunch::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_status', '!=', 'Pending')->sum('bill_amount');
        $lunch_total_amount = Lunch::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->sum('bill_amount');

        $dinner_amount_pending = Dinner::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_status', '=', 'Pending')->sum('bill_amount');
        $dinner_amount_paid = Dinner::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_status', '!=', 'Pending')->sum('bill_amount');
        $dinner_total_amount = Dinner::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->sum('bill_amount');

        $payment = Payment::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->get();
        $payment_total_amount = Payment::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->sum('amount');

        return view('pages.backend.customer.view', compact('data', 'breakfast_amount_pending', 'lunch_amount_pending', 'dinner_amount_pending', 'breakfast_amount_paid', 'lunch_amount_paid', 'dinner_amount_paid', 'breakfast_total_amount', 'lunch_total_amount', 'dinner_total_amount', 'payment', 'payment_total_amount'));
    }

    public function breakfastview($id)
    {
        $data = Customer::findOrFail($id);
        $breakfast = BreakFast::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->get();
        $breakfast_amount_pending = BreakFast::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('payment_amount');
        $breakfast_amount_paid = BreakFast::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('payment_amount');
        $breakfast_total_amount = BreakFast::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->sum('payment_amount');

        return view('pages.backend.customer.breakfast', compact('data', 'breakfast', 'breakfast_amount_pending', 'breakfast_amount_paid', 'breakfast_total_amount'));
    }

    public function lunchview($id)
    {
        $data = Customer::findOrFail($id);
        $lunch = Lunch::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->get();
        $lunch_amount_pending = Lunch::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('payment_amount');
        $lunch_amount_paid = Lunch::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('payment_amount');
        $lunch_total_amount = Lunch::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->sum('payment_amount');

        return view('pages.backend.customer.lunch', compact('data', 'lunch', 'lunch_amount_pending', 'lunch_amount_paid', 'lunch_total_amount'));
    }

    public function dinnerview($id)
    {
        $data = Customer::findOrFail($id);
        $dinner = Dinner::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->get();
        $dinner_amount_pending = Dinner::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('payment_amount');
        $dinner_amount_paid = Dinner::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('payment_amount');
        $dinner_total_amount = Dinner::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->sum('payment_amount');

        return view('pages.backend.customer.dinner', compact('data', 'dinner', 'dinner_amount_pending', 'dinner_amount_paid', 'dinner_total_amount'));
    }

    public function edit($id)
    {
        $data = Customer::findOrFail($id);

        return view('pages.backend.customer.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Customer::findOrFail($id);

        $data->name = $request->get('name');
        $data->contact_number = $request->get('contact_number');
        $data->email_address = $request->get('email_address');
        $data->address = $request->get('address');

        $data->update();

        return redirect()->route('customer.index')->with('update', 'Customer detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Customer::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('customer.index')->with('soft_destroy', 'Successfully deleted the customer !');
    }

    public function destroy($id)
    {
        $data = Customer::findOrFail($id);

        $data->delete();

        return redirect()->route('customer.index')->with('destroy', 'Successfully erased the customer !');
    }
}
