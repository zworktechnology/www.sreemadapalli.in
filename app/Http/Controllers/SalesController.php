<?php

namespace App\Http\Controllers;

use App\Models\BreakFast;
use App\Models\Customer;
use App\Models\Deliveryboy;
use App\Models\Dinner;
use App\Models\Lunch;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SalesController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');

        $breakfast_data = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $Breakfast_datearray = [];
        foreach ($breakfast_data as $key => $breakfast_data_arr) {
            $Breakfast_datearray[] = $breakfast_data_arr;
        }


        $lunch_data = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $Lunch_datearray = [];
        foreach ($lunch_data as $key => $lunch_data_arr) {
            $Lunch_datearray[] = $lunch_data_arr;
        }


        $dinner_data = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $Dinner_datearray = [];
        foreach ($dinner_data as $key => $dinner_data_arr) {
            $Dinner_datearray[] = $dinner_data_arr;
        }


        $output = array_merge($Breakfast_datearray, $Lunch_datearray, $Dinner_datearray);

        $daily_Data = [];
        foreach ($output as $key => $output_arr) {


            $customer = Customer::findOrFail($output_arr->customer_id);
            $devlivery_by = Deliveryboy::findOrFail($output_arr->delivery_boy_id);


            if($breakfast_data_arr->soft_delete == 1){
                $status = 'Deleted';
            }else{
                $status = 'Active';
            }

            $daily_Data[] = array(
                'title' => $output_arr->title,
                'date' => date('d-m-Y', strtotime($output_arr->date)),
                'invoice_no' => $output_arr->invoice_no,
                'customer' => $customer->name,
                'bill_amount' => $output_arr->bill_amount,
                'devlivery_by' => $devlivery_by->name,
                'payment_status' => $output_arr->payment_status,
                'status' => $status
            );

        }

        $breakfast_data_total = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('bill_amount');
        $breakfast_data_pm_cash = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Cash')->where('payment_status', '=', 'Payed')->sum('bill_amount');
        $breakfast_data_pm_wallet = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Cash')->where('payment_status', '=', 'Payed')->sum('bill_amount');
        $breakfast_data_ps_pending = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $breakfast_data_count = Count($breakfast_data);


        $lunch_data_total = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('bill_amount');
        $lunch_data_pm_cash = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Cash')->where('payment_status', '=', 'Payed')->sum('bill_amount');
        $lunch_data_pm_wallet = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Cash')->where('payment_status', '=', 'Payed')->sum('bill_amount');
        $lunch_data_ps_pending = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $lunch_data_count = Count($lunch_data);

        $dinner_data = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $dinner_data_total = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('bill_amount');
        $dinner_data_pm_cash = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Cash')->where('payment_status', '=', 'Payed')->sum('bill_amount');
        $dinner_data_pm_wallet = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Cash')->where('payment_status', '=', 'Payed')->sum('bill_amount');
        $dinner_data_ps_pending = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $dinner_data_count = Count($dinner_data);

        $customer = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $deliveryboy = Deliveryboy::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();

        return view('pages.backend.sales.index', compact('today', 'daily_Data',  'customer','breakfast_data_total', 'breakfast_data_pm_cash', 'breakfast_data_pm_wallet', 'breakfast_data_ps_pending', 'lunch_data_total', 'lunch_data_pm_cash',
        'lunch_data_pm_wallet', 'lunch_data_ps_pending', 'dinner_data_total', 'dinner_data_pm_cash', 'dinner_data_pm_wallet', 'dinner_data_ps_pending',
        'breakfast_data_count', 'lunch_data_count', 'dinner_data_count', 'deliveryboy'));
    }

    public function store(Request $request)
    {
        if($request->get('session') == 'Break_Fast') {

            $title = 'Break Fast';

            $data = new BreakFast();

            $data->title = $title;
            $data->date = $request->get('date');
            $data->invoice_no = $request->get('invoice_no');
            $data->delivery_boy_id = $request->get('delivery_boy_id');
            $data->bill_amount = $request->get('bill_amount');
            $data->delivery_amount = $request->get('delivery_amount');
            $data->payment_amount = $request->get('payment_amount');
            $data->payment_method = $request->get('payment_method');
            $data->customer_id = $request->get('customer_id');
            $data->payment_status = $request->get('payment_status');

            $data->save();

        } elseif($request->get('session') == 'Lunch') {


            $title = 'Lunch';

            $data = new Lunch();

            $data->title = $title;
            $data->date = $request->get('date');
            $data->invoice_no = $request->get('invoice_no');
            $data->delivery_boy_id = $request->get('delivery_boy_id');
            $data->bill_amount = $request->get('bill_amount');
            $data->delivery_amount = $request->get('delivery_amount');
            $data->payment_amount = $request->get('payment_amount');
            $data->payment_method = $request->get('payment_method');
            $data->customer_id = $request->get('customer_id');
            $data->payment_status = $request->get('payment_status');

            $data->save();

        } else {

            $title = 'Dinner';

            $data = new Dinner();

            $data->title = $title;
            $data->date = $request->get('date');
            $data->invoice_no = $request->get('invoice_no');
            $data->delivery_boy_id = $request->get('delivery_boy_id');
            $data->bill_amount = $request->get('bill_amount');
            $data->delivery_amount = $request->get('delivery_amount');
            $data->payment_amount = $request->get('payment_amount');
            $data->payment_method = $request->get('payment_method');
            $data->customer_id = $request->get('customer_id');
            $data->payment_status = $request->get('payment_status');

            $data->save();

        }

        return redirect()->route('sales.index')->with('add', 'Successful addition of a new sales record !');
    }
}
