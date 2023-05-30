<?php

namespace App\Http\Controllers;

use App\Models\BreakFast;
use App\Models\Customer;
use App\Models\Deliveryboy;
use App\Models\Dinner;
use App\Models\Lunch;
use App\Models\Payment;
use App\Models\Outdoor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class SalesController extends Controller
{
    public function index()
    {
        $daily_date = date('Y-m-d');
        $todaytime = date('h:i');
        $today = Carbon::now()->format('Y-m-d');

        $cardb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $cardl = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $cardd = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $walletcard = $cardb + $cardl + $cardd;

        $gpayb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $gpayl = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $gpayd = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $walletgpay = $gpayb + $gpayl + $gpayd;

        $gpaybusinessb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $gpaybusinessl = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $gpaybusinessd = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $walletgpaybusiness = $gpaybusinessb + $gpaybusinessl + $gpaybusinessd;

        $phonepeb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $phonepel = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $phoneped = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $walletphonepe = $phonepeb + $phonepel + $phoneped;

        $paytmb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $paytml = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $paytmd = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $walletpaytm = $paytmb + $paytml + $paytmd;

        $breakfast_data = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->get();
        $Breakfast_datearray = [];
        foreach ($breakfast_data as $key => $breakfast_data_arr) {
            $Breakfast_datearray[] = $breakfast_data_arr;
        }
        $breakfast_data_count = Count($breakfast_data);

        $lunch_data = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->get();
        $Lunch_datearray = [];
        foreach ($lunch_data as $key => $lunch_data_arr) {
            $Lunch_datearray[] = $lunch_data_arr;
        }
        $lunch_data_count = Count($lunch_data);

        $dinner_data = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->get();
        $Dinner_datearray = [];
        foreach ($dinner_data as $key => $dinner_data_arr) {
            $Dinner_datearray[] = $dinner_data_arr;
        }
        $dinner_data_count = Count($dinner_data);

        $output = array_merge($Breakfast_datearray, $Lunch_datearray, $Dinner_datearray);
        
        $daily_Data = [];
        $total_bill_amount = 0;
        foreach ($output as $key => $output_arr) {

            //Bill Amount
            $total_bill_amount += $output_arr->bill_amount;
            $customer = Customer::findOrFail($output_arr->customer_id);
            $devlivery_by = Deliveryboy::findOrFail($output_arr->delivery_boy_id);
            if($output_arr->soft_delete == 1){
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
                'payment_method' => $output_arr->payment_method,
                'status' => $status,
                'id' => $output_arr->id,
            );
        }

        // Total
        $breakfast_data_pm_total = BreakFast::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->sum('bill_amount');
        $lunch_data_pm_total = Lunch::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->sum('bill_amount');
        $dinner_data_pm_total = Dinner::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->sum('bill_amount');
        $total_total = $breakfast_data_pm_total + $lunch_data_pm_total + $dinner_data_pm_total;

        // Total Cash
        $breakfast_data_pm_cash = BreakFast::where('title', '=', 'Break Fast')
                ->where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '=', 'Cash')
                ->sum('bill_amount');
        $lunch_data_pm_cash = Lunch::where('title', '=', 'Lunch')
                ->where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '=', 'Cash')
                ->sum('bill_amount');
        $dinner_data_pm_cash = Dinner::where('title', '=', 'Dinner')
                ->where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '=', 'Cash')
                ->sum('bill_amount');
        $total_cash = $breakfast_data_pm_cash + $lunch_data_pm_cash + $dinner_data_pm_cash;

        // Total Wallet
        $breakfast_data_pm_wallet = BreakFast::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '!=', 'Cash')
                ->where('payment_method', '!=', 'Pending')
                ->sum('bill_amount');
        $lunch_data_pm_wallet = Lunch::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '!=', 'Cash')
                ->where('payment_method', '!=', 'Pending')
                ->sum('bill_amount');
        $dinner_data_pm_wallet = Dinner::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '!=', 'Cash')
                ->where('payment_method', '!=', 'Pending')
                ->sum('bill_amount');
        $total_wallet = $breakfast_data_pm_wallet + $lunch_data_pm_wallet + $dinner_data_pm_wallet;

        // Total Pending
        $breakfast_data_ps_pending = BreakFast::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '=', 'Pending')
                ->sum('bill_amount');
        $lunch_data_ps_pending = Lunch::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '=', 'Pending')
                ->sum('bill_amount');
        $dinner_data_ps_pending = Dinner::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '=', 'Pending')
                ->sum('bill_amount');
        $total_pending = $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending;

        $deliveryboy = Deliveryboy::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $deliveryboys_arr = [];
        $total_delivery_count = 0;
        foreach ($deliveryboy as $key => $deliveryboys) {

            $breakfast_data_count = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->get()->all();
            $lunch_data_ps_count = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->get()->all();
            $dinner_data_ps_count = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->get()->all();
            $delivery_count = Count($breakfast_data_count) + Count($lunch_data_ps_count) + Count($dinner_data_ps_count);

            $cardb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Card')->sum('bill_amount');
            $cardl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Card')->sum('bill_amount');
            $cardd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Card')->sum('bill_amount');
            $card = $cardb + $cardl + $cardd;

            $gpayb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
            $gpayl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
            $gpayd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
            $gpay = $gpayb + $gpayl + $gpayd;

            $gpaybusinessb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
            $gpaybusinessl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
            $gpaybusinessd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
            $gpaybusiness = $gpaybusinessb + $gpaybusinessl + $gpaybusinessd;

            $phonepeb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
            $phonepel = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
            $phoneped = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
            $phonepe = $phonepeb + $phonepel + $phoneped;

            $paytmb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
            $paytml = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
            $paytmd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
            $paytm = $paytmb + $paytml + $paytmd;

            $cashb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Cash')->sum('bill_amount');
            $cashl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Cash')->sum('bill_amount');
            $cashd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Cash')->sum('bill_amount');
            $cash = $cashb + $cashl + $cashd;

            $pendingb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $pendingl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $pendingd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $pending = $pendingb + $pendingl + $pendingd;

            $deliveryboys_arr[] = array(
                'name' => $deliveryboys->name,
                'delivery_count' => $delivery_count,
                'card' => $card,
                'gpay' => $gpay,
                'gpaybusiness' => $gpaybusiness,
                'phonepe' => $phonepe,
                'paytm' => $paytm,
                'pending' => $pending,
                'cash' => $cash,
            );

        }
        $date = date('d-m-Y', strtotime($daily_date));

        $customer = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $customerarr = [];
        foreach ($customer as $key => $customer_arr) {

            $breakfast_amount_pending = BreakFast::where('customer_id', '=', $customer_arr->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $lunch_amount_pending = Lunch::where('customer_id', '=', $customer_arr->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $dinner_amount_pending = Dinner::where('customer_id', '=', $customer_arr->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');

            $payment_total_amount = Payment::where('customer_id', '=', $customer_arr->id)->where('soft_delete', '!=', 1)->sum('amount');
            $pending = $breakfast_amount_pending + $lunch_amount_pending + $dinner_amount_pending - $payment_total_amount;

            $customerarr[] = array(
                'name' => $customer_arr->name,
                'pending' => $pending,
                'id' => $customer_arr->id,
            );
        }

        $customer_mobile = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();

        $breakfast_data_count1 = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '!=', 3)->get()->all();
        $lunch_data_count1 = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '!=', 3)->get()->all();
        $dinner_data_count1 = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '!=', 3)->get()->all();

        $total_delivey_count = Count($breakfast_data_count1) + Count($lunch_data_count1) + Count($dinner_data_count1);

        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();

        return view('pages.backend.sales.index', compact('todaytime', 'today', 'daily_Data', 'deliveryboy', 'breakfast_data_count', 'lunch_data_count', 'dinner_data_count',
        'total_bill_amount', 'total_cash', 'total_wallet', 'date', 'total_pending', 'deliveryboys_arr', 'customerarr',
        'walletcard', 'walletgpay', 'walletgpaybusiness', 'walletphonepe',
        'walletpaytm', 'breakfast_data_ps_pending', 'lunch_data_ps_pending', 'dinner_data_ps_pending',
        'breakfast_data_pm_cash', 'lunch_data_pm_cash', 'dinner_data_pm_cash',
        'total_total', 'breakfast_data_pm_total', 'lunch_data_pm_total', 'dinner_data_pm_total',
        'breakfast_data_pm_wallet', 'lunch_data_pm_wallet', 'dinner_data_pm_wallet', 'customer_mobile', 'total_delivey_count', 'notificationcount'));
    }

    public function dailyfilter(Request $request)
    {
        $daily_date = $request->get('daily_date');

        $today = Carbon::now()->format('Y-m-d');
        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();

        $cardb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $cardl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $cardd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $walletcard = $cardb + $cardl + $cardd;

        $gpayb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $gpayl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $gpayd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $walletgpay = $gpayb + $gpayl + $gpayd;

        $gpaybusinessb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $gpaybusinessl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $gpaybusinessd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $walletgpaybusiness = $gpaybusinessb + $gpaybusinessl + $gpaybusinessd;

        $phonepeb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $phonepel = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $phoneped = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $walletphonepe = $phonepeb + $phonepel + $phoneped;

        $paytmb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $paytml = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $paytmd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $walletpaytm = $paytmb + $paytml + $paytmd;

        $breakfast_data = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->get();
        $Breakfast_datearray = [];
        foreach ($breakfast_data as $key => $breakfast_data_arr) {
            $Breakfast_datearray[] = $breakfast_data_arr;
        }

        $breakfast_data_count = Count($breakfast_data);

        $lunch_data = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->get();
        $Lunch_datearray = [];
        foreach ($lunch_data as $key => $lunch_data_arr) {
            $Lunch_datearray[] = $lunch_data_arr;
        }

        $lunch_data_count = Count($lunch_data);

        $dinner_data = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->get();
        $Dinner_datearray = [];
        foreach ($dinner_data as $key => $dinner_data_arr) {
            $Dinner_datearray[] = $dinner_data_arr;
        }

        $dinner_data_count = Count($dinner_data);

        $dailyoutput = array_merge($Breakfast_datearray, $Lunch_datearray, $Dinner_datearray);

        $daily_Data = [];
        $total_bill_amount = 0;
        foreach ($dailyoutput as $key => $output_arr) {
            //Bill Amount
            $total_bill_amount += $output_arr->bill_amount;

            $customer = Customer::findOrFail($output_arr->customer_id);
            $devlivery_by = Deliveryboy::findOrFail($output_arr->delivery_boy_id);

            if($output_arr->soft_delete == 1){
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
                'payment_method' => $output_arr->payment_method,
                'status' => $status,
                'id' => $output_arr->id,
            );
        }

        // Total
        $breakfast_data_pm_total = BreakFast::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->sum('bill_amount');
        $lunch_data_pm_total = Lunch::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->sum('bill_amount');
        $dinner_data_pm_total = Dinner::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->sum('bill_amount');
        $total_total = $breakfast_data_pm_total + $lunch_data_pm_total + $dinner_data_pm_total;


        // Total Cash
        $breakfast_data_pm_cash = BreakFast::where('title', '=', 'Break Fast')
            ->where('date', '=', $daily_date)
            ->where('soft_delete', '!=', 1)
            ->where('payment_method', '=', 'Cash')
            ->sum('bill_amount');
        $lunch_data_pm_cash = Lunch::where('title', '=', 'Lunch')
                    ->where('date', '=', $daily_date)
                    ->where('soft_delete', '!=', 1)
                    ->where('payment_method', '=', 'Cash')
                    ->sum('bill_amount');
        $dinner_data_pm_cash = Dinner::where('title', '=', 'Dinner')
                    ->where('date', '=', $daily_date)
                    ->where('soft_delete', '!=', 1)
                    ->where('payment_method', '=', 'Cash')
                    ->sum('bill_amount');

        $total_cash = $breakfast_data_pm_cash + $lunch_data_pm_cash + $dinner_data_pm_cash;

        // Total Wallet
        $breakfast_data_pm_wallet = BreakFast::where('date', '=', $daily_date)
                    ->where('soft_delete', '!=', 1)
                    ->where('payment_method', '!=', 'Cash')
                    ->where('payment_method', '!=', 'Pending')
                    ->sum('bill_amount');

        $lunch_data_pm_wallet = Lunch::where('date', '=', $daily_date)
                    ->where('soft_delete', '!=', 1)
                    ->where('payment_method', '!=', 'Cash')
                    ->where('payment_method', '!=', 'Pending')
                    ->sum('bill_amount');

        $dinner_data_pm_wallet = Dinner::where('date', '=', $daily_date)
                    ->where('soft_delete', '!=', 1)
                    ->where('payment_method', '!=', 'Cash')
                    ->where('payment_method', '!=', 'Pending')
                    ->sum('bill_amount');

        $total_wallet = $breakfast_data_pm_wallet + $lunch_data_pm_wallet + $dinner_data_pm_wallet;

        // Total Pending
        $breakfast_data_ps_pending = BreakFast::where('date', '=', $daily_date)
                    ->where('soft_delete', '!=', 1)
                    ->where('payment_method', '=', 'Pending')
                    ->sum('bill_amount');

        $lunch_data_ps_pending = Lunch::where('date', '=', $daily_date)
                    ->where('soft_delete', '!=', 1)
                    ->where('payment_method', '=', 'Pending')
                    ->sum('bill_amount');

        $dinner_data_ps_pending = Dinner::where('date', '=', $daily_date)
                    ->where('soft_delete', '!=', 1)
                    ->where('payment_method', '=', 'Pending')
                    ->sum('bill_amount');

        $total_pending = $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending;

        $deliveryboy = Deliveryboy::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $deliveryboys_arr = [];
        $total_delivery_count = 0;
        foreach ($deliveryboy as $key => $deliveryboys) {

            $breakfast_data_count = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->get()->all();
            $lunch_data_ps_count = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->get()->all();
            $dinner_data_ps_count = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->get()->all();
            $delivery_count = Count($breakfast_data_count) + Count($lunch_data_ps_count) + Count($dinner_data_ps_count);

            $cardb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Card')->sum('bill_amount');
            $cardl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Card')->sum('bill_amount');
            $cardd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Card')->sum('bill_amount');
            $card = $cardb + $cardl + $cardd;

            $gpayb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
            $gpayl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
            $gpayd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
            $gpay = $gpayb + $gpayl + $gpayd;

            $gpaybusinessb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
            $gpaybusinessl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
            $gpaybusinessd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
            $gpaybusiness = $gpaybusinessb + $gpaybusinessl + $gpaybusinessd;

            $phonepeb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
            $phonepel = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
            $phoneped = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
            $phonepe = $phonepeb + $phonepel + $phoneped;

            $paytmb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
            $paytml = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
            $paytmd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
            $paytm = $paytmb + $paytml + $paytmd;

            $cashb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Cash')->sum('bill_amount');
            $cashl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Cash')->sum('bill_amount');
            $cashd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Cash')->sum('bill_amount');
            $cash = $cashb + $cashl + $cashd;

            $pendingb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $pendingl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $pendingd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $pending = $pendingb + $pendingl + $pendingd;

            $deliveryboys_arr[] = array(
                'name' => $deliveryboys->name,
                'delivery_count' => $delivery_count,
                'card' => $card,
                'gpay' => $gpay,
                'gpaybusiness' => $gpaybusiness,
                'phonepe' => $phonepe,
                'paytm' => $paytm,
                'pending' => $pending,
                'cash' => $cash,
            );


        }

        $date = date('d-m-Y', strtotime($daily_date));

        return view('pages.backend.sales.dailyfilter', compact('daily_Data', 'deliveryboy', 'breakfast_data_count', 'lunch_data_count',
        'dinner_data_count', 'date', 'total_bill_amount', 'total_cash', 'total_wallet', 'total_pending', 'deliveryboys_arr',
        'walletcard', 'walletgpay', 'walletgpaybusiness', 'walletphonepe', 'walletpaytm', 'breakfast_data_ps_pending', 'lunch_data_ps_pending', 'dinner_data_ps_pending',
        'breakfast_data_pm_cash', 'lunch_data_pm_cash', 'dinner_data_pm_cash',
        'total_total', 'breakfast_data_pm_total', 'lunch_data_pm_total', 'dinner_data_pm_total',
        'breakfast_data_pm_wallet', 'lunch_data_pm_wallet', 'dinner_data_pm_wallet', 'daily_date', 'notificationcount'));
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

    public function pdf_export($date)
    {
        $daily_date = $date;
        $today = $date;

        $cardb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $cardl = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $cardd = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $walletcard = $cardb + $cardl + $cardd;

        $gpayb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $gpayl = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $gpayd = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $walletgpay = $gpayb + $gpayl + $gpayd;

        $gpaybusinessb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $gpaybusinessl = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $gpaybusinessd = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $walletgpaybusiness = $gpaybusinessb + $gpaybusinessl + $gpaybusinessd;

        $phonepeb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $phonepel = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $phoneped = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $walletphonepe = $phonepeb + $phonepel + $phoneped;

        $paytmb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $paytml = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $paytmd = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $walletpaytm = $paytmb + $paytml + $paytmd;

        $breakfast_data = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->get();
        $Breakfast_datearray = [];
        foreach ($breakfast_data as $key => $breakfast_data_arr) {
            $Breakfast_datearray[] = $breakfast_data_arr;
        }
        $breakfast_data_count = Count($breakfast_data);

        $lunch_data = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->get();
        $Lunch_datearray = [];
        foreach ($lunch_data as $key => $lunch_data_arr) {
            $Lunch_datearray[] = $lunch_data_arr;
        }
        $lunch_data_count = Count($lunch_data);

        $dinner_data = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->get();
        $Dinner_datearray = [];
        foreach ($dinner_data as $key => $dinner_data_arr) {
            $Dinner_datearray[] = $dinner_data_arr;
        }
        $dinner_data_count = Count($dinner_data);

        $output = array_merge($Breakfast_datearray, $Lunch_datearray, $Dinner_datearray);

        $daily_Data = [];
        $total_bill_amount = 0;
        foreach ($output as $key => $output_arr) {

            //Bill Amount
            $total_bill_amount += $output_arr->bill_amount;
            $customer = Customer::findOrFail($output_arr->customer_id);
            $devlivery_by = Deliveryboy::findOrFail($output_arr->delivery_boy_id);
            if($output_arr->soft_delete == 1){
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
                'payment_method' => $output_arr->payment_method,
                'status' => $status,
                'id' => $output_arr->id,
            );
        }

        // Total
        $breakfast_data_pm_total = BreakFast::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->sum('bill_amount');
        $lunch_data_pm_total = Lunch::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->sum('bill_amount');
        $dinner_data_pm_total = Dinner::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->sum('bill_amount');
        $total_total = $breakfast_data_pm_total + $lunch_data_pm_total + $dinner_data_pm_total;

        // Total Cash
        $breakfast_data_pm_cash = BreakFast::where('title', '=', 'Break Fast')
                ->where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '=', 'Cash')
                ->sum('bill_amount');
        $lunch_data_pm_cash = Lunch::where('title', '=', 'Lunch')
                ->where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '=', 'Cash')
                ->sum('bill_amount');
        $dinner_data_pm_cash = Dinner::where('title', '=', 'Dinner')
                ->where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '=', 'Cash')
                ->sum('bill_amount');
        $total_cash = $breakfast_data_pm_cash + $lunch_data_pm_cash + $dinner_data_pm_cash;

        // Total Wallet
        $breakfast_data_pm_wallet = BreakFast::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '!=', 'Cash')
                ->where('payment_method', '!=', 'Pending')
                ->sum('bill_amount');
        $lunch_data_pm_wallet = Lunch::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '!=', 'Cash')
                ->where('payment_method', '!=', 'Pending')
                ->sum('bill_amount');
        $dinner_data_pm_wallet = Dinner::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '!=', 'Cash')
                ->where('payment_method', '!=', 'Pending')
                ->sum('bill_amount');
        $total_wallet = $breakfast_data_pm_wallet + $lunch_data_pm_wallet + $dinner_data_pm_wallet;

        // Total Pending
        $breakfast_data_ps_pending = BreakFast::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '=', 'Pending')
                ->sum('bill_amount');
        $lunch_data_ps_pending = Lunch::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '=', 'Pending')
                ->sum('bill_amount');
        $dinner_data_ps_pending = Dinner::where('date', '=', $daily_date)
                ->where('soft_delete', '!=', 1)
                ->where('payment_method', '=', 'Pending')
                ->sum('bill_amount');
        $total_pending = $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending;

        $deliveryboy = Deliveryboy::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $deliveryboys_arr = [];
        $total_delivery_count = 0;
        foreach ($deliveryboy as $key => $deliveryboys) {

            $breakfast_data_count = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->get()->all();
            $lunch_data_ps_count = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->get()->all();
            $dinner_data_ps_count = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->get()->all();
            $delivery_count = Count($breakfast_data_count) + Count($lunch_data_ps_count) + Count($dinner_data_ps_count);

            $cardb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Card')->sum('bill_amount');
            $cardl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Card')->sum('bill_amount');
            $cardd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Card')->sum('bill_amount');
            $card = $cardb + $cardl + $cardd;

            $gpayb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
            $gpayl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
            $gpayd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
            $gpay = $gpayb + $gpayl + $gpayd;

            $gpaybusinessb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
            $gpaybusinessl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
            $gpaybusinessd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
            $gpaybusiness = $gpaybusinessb + $gpaybusinessl + $gpaybusinessd;

            $phonepeb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
            $phonepel = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
            $phoneped = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
            $phonepe = $phonepeb + $phonepel + $phoneped;

            $paytmb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
            $paytml = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
            $paytmd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
            $paytm = $paytmb + $paytml + $paytmd;

            $cashb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Cash')->sum('bill_amount');
            $cashl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Cash')->sum('bill_amount');
            $cashd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Cash')->sum('bill_amount');
            $cash = $cashb + $cashl + $cashd;

            $pendingb = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $pendingl = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $pendingd = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '=', $deliveryboys->id)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $pending = $pendingb + $pendingl + $pendingd;

            $deliveryboys_arr[] = array(
                'name' => $deliveryboys->name,
                'delivery_count' => $delivery_count,
                'card' => $card,
                'gpay' => $gpay,
                'gpaybusiness' => $gpaybusiness,
                'phonepe' => $phonepe,
                'paytm' => $paytm,
                'pending' => $pending,
                'cash' => $cash,
            );

        }
        $date = date('d-m-Y', strtotime($daily_date));

        $customer = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $customerarr = [];
        foreach ($customer as $key => $customer_arr) {

            $breakfast_amount_pending = BreakFast::where('customer_id', '=', $customer_arr->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $lunch_amount_pending = Lunch::where('customer_id', '=', $customer_arr->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $dinner_amount_pending = Dinner::where('customer_id', '=', $customer_arr->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');

            $payment_total_amount = Payment::where('customer_id', '=', $customer_arr->id)->where('soft_delete', '!=', 1)->sum('amount');
            $pending = $breakfast_amount_pending + $lunch_amount_pending + $dinner_amount_pending - $payment_total_amount;

            $customerarr[] = array(
                'name' => $customer_arr->name,
                'pending' => $pending,
                'id' => $customer_arr->id,
            );
        }

        $customer_mobile = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();

        $breakfast_data_count1 = BreakFast::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '!=', 3)->get()->all();
        $lunch_data_count1 = Lunch::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '!=', 3)->get()->all();
        $dinner_data_count1 = Dinner::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->where('delivery_boy_id', '!=', 3)->get()->all();

        $total_delivey_count = Count($breakfast_data_count1) + Count($lunch_data_count1) + Count($dinner_data_count1);

        $pdf = Pdf::loadView('pages.backend.sales.pdf.pdfexport', [
            'total_cash' => $total_cash,
            'total_pending' => $total_pending,
            'total_wallet' => $total_wallet,
            'daily_Data' => $daily_Data,
            'date' => $today,
            'total_total' => $total_total,
        ]);

        $name = 'All' . '_' . $date . '.' . 'pdf';

        return $pdf->download($name);
    }

    public function pdfbybreafast($date)
    {
        $today = $date;

        $cardb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $gpayb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $gpaybusinessb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $phonepeb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $paytmb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $wallet = $cardb + $gpayb + $gpaybusinessb + $phonepeb + $paytmb;
        $pending = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $cash = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Cash')->sum('bill_amount');
        $total = $wallet + $pending + $cash;

        $data = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();

        $pdf = Pdf::loadView('pages.backend.sales.pdf.pdfexport_breakfast', [
            'cash' => $cash,
            'pending' => $pending,
            'wallet' => $wallet,
            'data' => $data,
            'date' => $today,
            'total' => $total,
        ]);

        $name = 'Breakfast' . '_' . $date . '.' . 'pdf';

        return $pdf->download($name);
    }

    public function pdfbylunch($date)
    {
        $today = $date;

        $cardb = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $gpayb = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $gpaybusinessb = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $phonepeb = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $paytmb = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $wallet = $cardb + $gpayb + $gpaybusinessb + $phonepeb + $paytmb;
        $pending = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $cash = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Cash')->sum('bill_amount');
        $total = $wallet + $pending + $cash;

        $data = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();

        $pdf = Pdf::loadView('pages.backend.sales.pdf.pdfexport_lunch', [
            'cash' => $cash,
            'pending' => $pending,
            'wallet' => $wallet,
            'data' => $data,
            'date' => $today,
            'total' => $total,
        ]);

        $name = 'Lunch' . '_' . $date . '.' . 'pdf';

        return $pdf->download($name);
    }

    public function pdfbydinner($date)
    {
        $today = $date;

        $cardb = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $gpayb = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $gpaybusinessb = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $phonepeb = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $paytmb = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $wallet = $cardb + $gpayb + $gpaybusinessb + $phonepeb + $paytmb;
        $pending = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $cash = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Cash')->sum('bill_amount');
        $total = $wallet + $pending + $cash;

        $data = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();

        $pdf = Pdf::loadView('pages.backend.sales.pdf.pdfexport_dinner', [
            'cash' => $cash,
            'pending' => $pending,
            'wallet' => $wallet,
            'data' => $data,
            'date' => $today,
            'total' => $total,
        ]);

        $name = 'Dinner' . '_' . $date . '.' . 'pdf';

        return $pdf->download($name);
    }

    public function pdfbybreafastlunch($date)
    {
        $today = $date;

        $cardb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $gpayb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $gpaybusinessb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $phonepeb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $paytmb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $cardl = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Card')->sum('bill_amount');
        $gpayl = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay')->sum('bill_amount');
        $gpaybusinessl = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'G-Pay Business')->sum('bill_amount');
        $phonepel = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Phone Pe')->sum('bill_amount');
        $paytml = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Paytm')->sum('bill_amount');
        $wallet = $cardb + $gpayb + $gpaybusinessb + $phonepeb + $paytmb + $cardl + $gpayl + $gpaybusinessl + $phonepel + $paytml;
        $pendingb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $pendingl = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $pending = $pendingb + $pendingl;
        $cashb = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Cash')->sum('bill_amount');
        $cashl = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Cash')->sum('bill_amount');
        $cash = $cashb + $cashl;
        $total = $wallet + $pending + $cash;

        $datab = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $datal = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();

        $pdf = Pdf::loadView('pages.backend.sales.pdf.pdfexport_breakfast_luch', [
            'cash' => $cash,
            'pending' => $pending,
            'wallet' => $wallet,
            'datab' => $datab,
            'datal' => $datal,
            'date' => $today,
            'total' => $total,
        ]);

        $name = 'Breakfast_and_lunch' . '_' . $date . '.' . 'pdf';

        return $pdf->download($name);
    }
}
