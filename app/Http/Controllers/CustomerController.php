<?php

namespace App\Http\Controllers;

use App\Models\BreakFast;
use App\Models\Customer;
use App\Models\Dinner;
use App\Models\Lunch;
use App\Models\Payment;
use App\Models\Outdoor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class CustomerController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');
        $customer = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $data = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $index_amount_arr = [];

        foreach ($data as $datas) {

            $breakfastTotamount = BreakFast::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $lunchTotamount = Lunch::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $dinnerTotamount = Dinner::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('bill_amount');

            $breakfast_amount_paid = BreakFast::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $lunch_amount_paid = Lunch::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $dinner_amount_paid = Dinner::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');

            $breakfast_amount_pending = BreakFast::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $lunch_amount_pending = Lunch::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $dinner_amount_pending = Dinner::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');

            $payment_total_amount = Payment::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('amount');

            //Total
            $totalamount = $breakfastTotamount + $lunchTotamount + $dinnerTotamount;
            $paid = $breakfast_amount_paid + $lunch_amount_paid + $dinner_amount_paid + $payment_total_amount;
            $pending = $breakfast_amount_pending + $lunch_amount_pending + $dinner_amount_pending - $payment_total_amount;

            $index_amount_arr[] = array(
                'name' => $datas->name,
                'contact_number' => $datas->contact_number,
                'totalamount' => $totalamount,
                'paid' => $paid,
                'pending' => $pending,
                'id' => $datas->id,
            );

        }

        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();

        return view('pages.backend.customer.index', compact('data', 'index_amount_arr', 'today', 'customer', 'notificationcount'));
    }

    public function all()
    {
        $today = date('Y-m-d');
        $customer = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $data = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $index_amount_arr = [];

        foreach ($data as $datas) {

            $breakfastTotamount = BreakFast::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $lunchTotamount = Lunch::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $dinnerTotamount = Dinner::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('bill_amount');

            $breakfast_amount_paid = BreakFast::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $lunch_amount_paid = Lunch::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $dinner_amount_paid = Dinner::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');

            $breakfast_amount_pending = BreakFast::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $lunch_amount_pending = Lunch::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $dinner_amount_pending = Dinner::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');

            $payment_total_amount = Payment::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('amount');

            //Total
            $totalamount = $breakfastTotamount + $lunchTotamount + $dinnerTotamount;
            $paid = $breakfast_amount_paid + $lunch_amount_paid + $dinner_amount_paid + $payment_total_amount;
            $pending = $breakfast_amount_pending + $lunch_amount_pending + $dinner_amount_pending - $payment_total_amount;

            $index_amount_arr[] = array(
                'name' => $datas->name,
                'contact_number' => $datas->contact_number,
                'totalamount' => $totalamount,
                'paid' => $paid,
                'pending' => $pending,
                'id' => $datas->id,
            );

        }

        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();

        return view('pages.backend.customer.all', compact('data', 'index_amount_arr', 'today', 'customer', 'notificationcount'));
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

        return redirect()->back()->with('add', 'Successful addition of a new customer !');
    }

    public function view($id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $customer = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();

        $data = Customer::findOrFail($id);

        $breakfast_amount_pending = BreakFast::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $breakfast_amount_paid = BreakFast::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
        $breakfast_total_amount = BreakFast::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->sum('bill_amount');


        $lunch_amount_pending = Lunch::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $lunch_amount_paid = Lunch::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
        $lunch_total_amount = Lunch::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->sum('bill_amount');

        $dinner_amount_pending = Dinner::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $dinner_amount_paid = Dinner::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
        $dinner_total_amount = Dinner::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->sum('bill_amount');

        $payment = Payment::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->get();
        $payment_total_amount = Payment::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->sum('amount');

        // Datewise Customer's order
        $GetBreakfastData = BreakFast::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->get();
        $Breakfast_Date_arr = [];
        foreach ($GetBreakfastData as $key => $GetBreakfastDatas) {
            $Breakfast_Date_arr[] = $GetBreakfastDatas->date;
        }

        $GetLunchData = Lunch::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->get();
        $Lunch_Date_arr = [];
        foreach ($GetLunchData as $key => $GetLunchDatas) {
            $Lunch_Date_arr[] = $GetLunchDatas->date;
        }

        $GetDinnerData = Dinner::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->get();
        $Dinner_Date_arr = [];
        foreach ($GetDinnerData as $key => $GetDinnerDatas) {
            $Dinner_Date_arr[] = $GetDinnerDatas->date;
        }

        $merging_Data = array_merge($Breakfast_Date_arr, $Lunch_Date_arr, $Dinner_Date_arr);
        usort($merging_Data, function ($a, $b) {
            $dateTimestamp1 = strtotime($a);
            $dateTimestamp2 = strtotime($b);

            return $dateTimestamp1 < $dateTimestamp2 ? 1 : -1;
        });

        $Custumer_index_array = [];
        foreach (array_unique($merging_Data) as $key => $merging_Datas) {

            $CustomersBreakfastAmt = BreakFast::where('customer_id', '=', $data->id)->where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->sum('bill_amount');
            $CustomersLunchAmt = Lunch::where('customer_id', '=', $data->id)->where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->sum('bill_amount');
            $CustomersDinnerAmt = Dinner::where('customer_id', '=', $data->id)->where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->sum('bill_amount');
            $TotalAmount = $CustomersBreakfastAmt + $CustomersLunchAmt + $CustomersDinnerAmt;


            $customer_bf_paidstatus = BreakFast::where('customer_id', '=', $data->id)->where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->first();
            if($customer_bf_paidstatus){

                    if($customer_bf_paidstatus->payment_method == 'Pending'){
                        $bf_status = 'style=color:red';
                    }else{
                        $bf_status = 'style=color:green';
                    }

            }else{
                $bf_status = '';
            }



            $customer_l_paidstatus = Lunch::where('customer_id', '=', $data->id)->where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->first();
            if($customer_l_paidstatus){

                    if($customer_l_paidstatus->payment_method == 'Pending'){
                        $l_status = 'style=color:red';
                    }else{
                        $l_status = 'style=color:green';
                    }

            }else{
                $l_status = '';
            }



            $customer_d_paidstatus = Dinner::where('customer_id', '=', $data->id)->where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->first();
            if($customer_d_paidstatus){

                    if($customer_d_paidstatus->payment_method == 'Pending'){
                        $d_status = 'style=color:red';
                    }else{
                        $d_status = 'style=color:green';
                    }

            }else{
                $d_status = '';
            }






            $Custumer_index_array[] = array(
                'date' => date('d-m-Y', strtotime($merging_Datas)),
                'CustomersBreakfastAmt' => $CustomersBreakfastAmt,
                'CustomersLunchAmt' => $CustomersLunchAmt,
                'CustomersDinnerAmt' => $CustomersDinnerAmt,
                'TotalAmount' => $TotalAmount,
                'customer_id' => $data->id,
                'bf_status' => $bf_status,
                'l_status' => $l_status,
                'd_status' => $d_status,
            );
        }


        $BreakfastData = BreakFast::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->get();
        $Breakfast_arr = [];
        foreach ($BreakfastData as $key => $BreakfastDatas) {
            $Breakfast_arr[] = $BreakfastDatas->date;
        }

        $LunchData = Lunch::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->get();
        $Lunch_arr = [];
        foreach ($LunchData as $key => $LunchDatas) {
            $Lunch_arr[] = $LunchDatas->date;
        }

        $DinnerData = Dinner::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->get();
        $Dinner_arr = [];
        foreach ($DinnerData as $key => $DinnerDatas) {
            $Dinner_arr[] = $DinnerDatas->date;
        }

        $merging_Arr = array_merge($Breakfast_arr, $Lunch_arr, $Dinner_arr);

        usort($merging_Arr, function ($a, $b) {
            $dateTimestamp1 = strtotime($a);
            $dateTimestamp2 = strtotime($b);

            return $dateTimestamp1 - $dateTimestamp2;
        });







            $uniquearray = array_unique($merging_Arr);
            $reverse = array_reverse( $uniquearray );
            $today = date("Y-m-d");
            if($reverse){
                if($reverse[0] == $today){
                    $secondLast = $reverse[1];
                }else if($reverse[0] != $today){
                    $secondLast = $reverse[0];
                }




            $CustomersBreakfastAmt = BreakFast::where('customer_id', '=', $data->id)->where('date', '=', $secondLast)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $CustomersLunchAmt = Lunch::where('customer_id', '=', $data->id)->where('date', '=', $secondLast)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $CustomersDinnerAmt = Dinner::where('customer_id', '=', $data->id)->where('date', '=', $secondLast)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $TotalAmount = $CustomersBreakfastAmt + $CustomersLunchAmt + $CustomersDinnerAmt;

            $Custumer_recent_array = [];


                    $Custumer_recent_array[] = array(
                        'date' => date('d-m-Y', strtotime($secondLast)),
                        'CustomersBreakfastAmt' => $CustomersBreakfastAmt,
                        'CustomersLunchAmt' => $CustomersLunchAmt,
                        'CustomersDinnerAmt' => $CustomersDinnerAmt,
                        'TotalAmount' => $TotalAmount,
                    );




            }else {
                $Custumer_recent_array[] = array(
                    'date' => '',
                    'CustomersBreakfastAmt' => '',
                    'CustomersLunchAmt' => '',
                    'CustomersDinnerAmt' => '',
                    'TotalAmount' => '',
                );
            }


        return view('pages.backend.customer.view', compact('today', 'customer', 'data', 'breakfast_amount_pending', 'lunch_amount_pending', 'dinner_amount_pending', 'breakfast_amount_paid', 'lunch_amount_paid', 'dinner_amount_paid', 'breakfast_total_amount', 'lunch_total_amount', 'dinner_total_amount', 'payment', 'payment_total_amount', 'Custumer_index_array', 'Custumer_recent_array'));
    }

    public function export_customerorder_pdf($id)
    {
        $GetBreakfastData = BreakFast::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->get();
        $Breakfast_Date_arr = [];
        foreach ($GetBreakfastData as $key => $GetBreakfastDatas) {
            $Breakfast_Date_arr[] = $GetBreakfastDatas->date;
        }

        $GetLunchData = Lunch::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->get();
        $Lunch_Date_arr = [];
        foreach ($GetLunchData as $key => $GetLunchDatas) {
            $Lunch_Date_arr[] = $GetLunchDatas->date;
        }

        $GetDinnerData = Dinner::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->get();
        $Dinner_Date_arr = [];
        foreach ($GetDinnerData as $key => $GetDinnerDatas) {
            $Dinner_Date_arr[] = $GetDinnerDatas->date;
        }

        $merging_Data = array_merge($Breakfast_Date_arr, $Lunch_Date_arr, $Dinner_Date_arr);
        usort($merging_Data, function ($a, $b) {
            $dateTimestamp1 = strtotime($a);
            $dateTimestamp2 = strtotime($b);

            return $dateTimestamp1 < $dateTimestamp2 ? 1 : -1;
        });
        $Custumer_pdf_array = [];
        foreach (array_unique($merging_Data) as $key => $merging_Datas) {



            $CustomersBreakfastAmt = BreakFast::where('customer_id', '=', $id)->where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $CustomersLunchAmt = Lunch::where('customer_id', '=', $id)->where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $CustomersDinnerAmt = Dinner::where('customer_id', '=', $id)->where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $TotalAmount = $CustomersBreakfastAmt + $CustomersLunchAmt + $CustomersDinnerAmt;

            $Custumer_pdf_array[] = array(
                'date' => date('d-m-Y', strtotime($merging_Datas)),
                'CustomersBreakfastAmt' => $CustomersBreakfastAmt,
                'CustomersLunchAmt' => $CustomersLunchAmt,
                'CustomersDinnerAmt' => $CustomersDinnerAmt,
                'TotalAmount' => $TotalAmount

            );

        }

        $customerdata = Customer::findOrFail($id);
        $customer_name = $customerdata->name;

            $breakfast_amount_pending = BreakFast::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $breakfast_amount_paid = BreakFast::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $breakfast_total_amount = BreakFast::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->sum('bill_amount');


            $lunch_amount_pending = Lunch::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $lunch_amount_paid = Lunch::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $lunch_total_amount = Lunch::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->sum('bill_amount');

            $dinner_amount_pending = Dinner::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $dinner_amount_paid = Dinner::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $dinner_total_amount = Dinner::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->sum('bill_amount');

            $total_paid = $breakfast_amount_paid + $lunch_amount_paid + $dinner_amount_paid;
            $total_pending = $breakfast_amount_pending + $lunch_amount_pending + $dinner_amount_pending;
            $total_amount = $breakfast_total_amount + $lunch_total_amount + $dinner_total_amount;
            $payment_total_amount = Payment::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->sum('amount');


        $pdf = Pdf::loadView('pages.backend.customer.exportpdf', [
            'Custumer_pdf_array' => $Custumer_pdf_array,
            'customerdata' => $customerdata,
            'total_amount' => $total_amount,
            'total_paid' => $total_paid,
            'total_pending' => $total_pending,
            'payment_total_amount' => $payment_total_amount,
        ]);
        return $pdf->download($customerdata->name . '.pdf');
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




    public function getdatewiseCustomerOrders(Request $request)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $customer_id = $request->get('customer_ids');

            //Get Breakfast Dates
        $Breakfast_datearr = BreakFast::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->get();
        $Breakfast_datearray = [];
        foreach ($Breakfast_datearr as $key => $Breakfast_datearrs) {
            $Breakfast_datearray[] = $Breakfast_datearrs->date;
        }

        //Get Lunch Dates
        $Lunch_datearr = Lunch::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->get();
        $Lunch_datearray = [];
        foreach ($Lunch_datearr as $key => $Lunch_datearrs) {
            $Lunch_datearray[] = $Lunch_datearrs->date;
        }

        //Get Dinner Dates
        $Dinner_datearr = Dinner::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->orderBy('date', 'desc')->get();
        $Dinner_datearray = [];
        foreach ($Dinner_datearr as $key => $Dinner_datearrs) {
            $Dinner_datearray[] = $Dinner_datearrs->date;
        }


        $merging_Datearr = array_merge($Breakfast_datearray, $Lunch_datearray, $Dinner_datearray);
        usort($merging_Datearr, function ($a, $b) {
            $dateTimestamp1 = strtotime($a);
            $dateTimestamp2 = strtotime($b);

            return $dateTimestamp1 < $dateTimestamp2 ? 1 : -1;
        });
        $Custumer_filter_array = [];
        foreach (array_unique($merging_Datearr) as $key => $merging_Datearray) {

            $BreakfastAmount = BreakFast::where('customer_id', '=', $customer_id)->where('date', '=', $merging_Datearray)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $LunchAmount = Lunch::where('customer_id', '=', $customer_id)->where('date', '=', $merging_Datearray)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $DinnerAmount = Dinner::where('customer_id', '=', $customer_id)->where('date', '=', $merging_Datearray)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $TotalCustomerAmount = $BreakfastAmount + $LunchAmount + $DinnerAmount;


            $Custumer_filter_array[] = array(
                'date' => date('d-m-Y', strtotime($merging_Datearray)),
                'BreakfastAmount' => $BreakfastAmount,
                'LunchAmount' => $LunchAmount,
                'DinnerAmount' => $DinnerAmount,
                'TotalCustomerAmount' => $TotalCustomerAmount
            );
        }
        //Total Amount
        $breakfast_total_amount = BreakFast::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->sum('bill_amount');
        $lunch_total_amount = Lunch::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->sum('bill_amount');
        $Dinner_total_amount = Dinner::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->sum('bill_amount');
        $total_filter_amount = $breakfast_total_amount + $lunch_total_amount + $Dinner_total_amount;

        // Total Amount Paid
        $breakfast_amount_paid = BreakFast::whereBetween('date', [$from_date, $to_date])
                                            ->where('customer_id', '=', $customer_id)
                                            ->where('soft_delete', '!=', 1)
                                            ->where('payment_status', '!=', 'Pending')
                                            ->sum('bill_amount');

        $lunch_amount_paid = Lunch::whereBetween('date', [$from_date, $to_date])
                                            ->where('customer_id', '=', $customer_id)
                                            ->where('soft_delete', '!=', 1)
                                            ->where('payment_status', '!=', 'Pending')
                                            ->sum('bill_amount');

        $dinner_amount_paid = Dinner::whereBetween('date', [$from_date, $to_date])
                                            ->where('customer_id', '=', $customer_id)
                                            ->where('soft_delete', '!=', 1)
                                            ->where('payment_status', '!=', 'Pending')
                                            ->sum('bill_amount');

        $total_paid_amount = $breakfast_amount_paid + $lunch_amount_paid + $dinner_amount_paid;

        // Total Payment Amount
        $payment_total_amount = Payment::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->sum('amount');


        // Total Pending

        $breakfast_amount_pending = BreakFast::where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->where('payment_status', '=', 'Pending')->sum('bill_amount');
        $Lunch_amount_pending = Lunch::where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->where('payment_status', '=', 'Pending')->sum('bill_amount');
        $dinner_amount_pending = Dinner::where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->where('payment_status', '=', 'Pending')->sum('bill_amount');

        $total_pending = $breakfast_amount_pending + $Lunch_amount_pending + $dinner_amount_pending;

        // Payment Array
        $payment_Arr = Payment::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->get();


        $customerdata = Customer::findOrFail($customer_id);

        return view('pages.backend.customer.datefilter', compact('Custumer_filter_array', 'total_filter_amount', 'total_paid_amount', 'payment_total_amount', 'total_pending', 'customer_id', 'payment_Arr', 'customerdata', 'from_date', 'to_date'));

    }






    public function export_customerorder_filter_pdf($id, $from_date, $to_date)
    {

        $GetBreakfastData = BreakFast::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->get();
        $Breakfast_Date_arr = [];
        foreach ($GetBreakfastData as $key => $GetBreakfastDatas) {
            $Breakfast_Date_arr[] = $GetBreakfastDatas->date;
        }

        $GetLunchData = Lunch::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->get();
        $Lunch_Date_arr = [];
        foreach ($GetLunchData as $key => $GetLunchDatas) {
            $Lunch_Date_arr[] = $GetLunchDatas->date;
        }

        $GetDinnerData = Dinner::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->get();
        $Dinner_Date_arr = [];
        foreach ($GetDinnerData as $key => $GetDinnerDatas) {
            $Dinner_Date_arr[] = $GetDinnerDatas->date;
        }

        $merging_Data = array_merge($Breakfast_Date_arr, $Lunch_Date_arr, $Dinner_Date_arr);
        usort($merging_Data, function ($a, $b) {
            $dateTimestamp1 = strtotime($a);
            $dateTimestamp2 = strtotime($b);

            return $dateTimestamp1 < $dateTimestamp2 ? 1 : -1;
        });
        $Custumer_pdf_array = [];
        foreach (array_unique($merging_Data) as $key => $merging_Datas) {


            $CustomersBreakfastAmt = BreakFast::where('customer_id', '=', $id)->where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $CustomersLunchAmt = Lunch::where('customer_id', '=', $id)->where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $CustomersDinnerAmt = Dinner::where('customer_id', '=', $id)->where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $TotalAmount = $CustomersBreakfastAmt + $CustomersLunchAmt + $CustomersDinnerAmt;

            $Custumer_pdf_array[] = array(
                'date' => date('d-m-Y', strtotime($merging_Datas)),
                'CustomersBreakfastAmt' => $CustomersBreakfastAmt,
                'CustomersLunchAmt' => $CustomersLunchAmt,
                'CustomersDinnerAmt' => $CustomersDinnerAmt,
                'TotalAmount' => $TotalAmount
            );

        }

        $customerdata = Customer::findOrFail($id);


            $breakfast_amount_pending = BreakFast::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $breakfast_amount_paid = BreakFast::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $breakfast_total_amount = BreakFast::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->sum('bill_amount');


            $lunch_amount_pending = Lunch::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $lunch_amount_paid = Lunch::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $lunch_total_amount = Lunch::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->sum('bill_amount');

            $dinner_amount_pending = Dinner::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $dinner_amount_paid = Dinner::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $dinner_total_amount = Dinner::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->sum('bill_amount');

            $total_paid = $breakfast_amount_paid + $lunch_amount_paid + $dinner_amount_paid;
            $total_pending = $breakfast_amount_pending + $lunch_amount_pending + $dinner_amount_pending;
            $total_amount = $breakfast_total_amount + $lunch_total_amount + $dinner_total_amount;
            $payment_total_amount = Payment::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->sum('amount');

        $pdf = Pdf::loadView('pages.backend.customer.exportpdf', [
            'Custumer_pdf_array' => $Custumer_pdf_array,
            'customerdata' => $customerdata,
            'total_amount' => $total_amount,
            'total_paid' => $total_paid,
            'total_pending' => $total_pending,
            'payment_total_amount' => $payment_total_amount,
        ]);
        return $pdf->download($customerdata->name . '.pdf');
    }



    public function getphoneno($customer_id)
    {
        $customerdata = Customer::findOrFail($customer_id);

        $breakfast_amount_pending = BreakFast::where('customer_id', '=', $customerdata->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $lunch_amount_pending = Lunch::where('customer_id', '=', $customerdata->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $dinner_amount_pending = Dinner::where('customer_id', '=', $customerdata->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');

        $payment_total_amount = Payment::where('customer_id', '=', $customerdata->id)->where('soft_delete', '!=', 1)->sum('amount');
        $pending = $breakfast_amount_pending + $lunch_amount_pending + $dinner_amount_pending - $payment_total_amount;


        $latest_breakfast = BreakFast::where('customer_id', '=', $customerdata->id)->where('soft_delete', '!=', 1)->latest('id')->first();
        $latest_lunch = Lunch::where('customer_id', '=', $customerdata->id)->where('soft_delete', '!=', 1)->latest('id')->first();
        $latest_dinner = Dinner::where('customer_id', '=', $customerdata->id)->where('soft_delete', '!=', 1)->latest('id')->first();

        if($latest_breakfast != ""){
            $latest_bf = $latest_breakfast->date;
        }else {
            $latest_bf = '';
        }

        if($latest_lunch != ""){
            $latest_l = $latest_lunch->date;
        }else {
            $latest_l = '';
        }


        if($latest_dinner != ""){
            $latest_dner = $latest_dinner->date;
        }else {
            $latest_dner = '';
        }


        $date_arr = array('bf_date' => $latest_bf, 'lunch_date' => $latest_l, 'dinner_date' => $latest_dner);
        usort($date_arr, function($a, $b) {
            $dateTimestamp1 = strtotime($a);
            $dateTimestamp2 = strtotime($b);

            return $dateTimestamp1 < $dateTimestamp2 ? -1: 1;
        });




        $latest_date = $date_arr[count($date_arr) - 1];

        $latest_dat = date('d-M-Y', strtotime($latest_date));

        $customer_Arr[] = array(
            'id' => $customerdata->id,
            'contact_number' => $customerdata->contact_number,
            'pending' => $pending,
            'latest_date' => $latest_dat,
        );


        echo json_encode($customer_Arr);
    }

    public function getcustomerId($phoneno)
    {
        $customermobiledata = Customer::where('contact_number', '=', $phoneno)->first();

        $breakfast_amount_pending = BreakFast::where('customer_id', '=', $customermobiledata->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $lunch_amount_pending = Lunch::where('customer_id', '=', $customermobiledata->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $dinner_amount_pending = Dinner::where('customer_id', '=', $customermobiledata->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');

        $payment_total_amount = Payment::where('customer_id', '=', $customermobiledata->id)->where('soft_delete', '!=', 1)->sum('amount');
        $pending = $breakfast_amount_pending + $lunch_amount_pending + $dinner_amount_pending - $payment_total_amount;


        $customer_Arr[] = array(
            'id' => $customermobiledata->id,
            'contact_number' => $customermobiledata->contact_number,
            'pending' => $pending
        );

        echo json_encode($customer_Arr);
    }



    public function export_allcustomer_pdf()
    {
       
        
        $today = date('Y-m-d');
        $data = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get();
        $index_amount_arr = [];

        foreach ($data as $datas) {

            $breakfastTotamount = BreakFast::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $lunchTotamount = Lunch::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $dinnerTotamount = Dinner::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('bill_amount');

            $breakfast_amount_paid = BreakFast::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $lunch_amount_paid = Lunch::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $dinner_amount_paid = Dinner::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');

            $breakfast_amount_pending = BreakFast::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $lunch_amount_pending = Lunch::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $dinner_amount_pending = Dinner::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');

            $payment_total_amount = Payment::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('amount');

            //Total
            $totalamount = $breakfastTotamount + $lunchTotamount + $dinnerTotamount;
            $paid = $breakfast_amount_paid + $lunch_amount_paid + $dinner_amount_paid + $payment_total_amount;
            $pending = $breakfast_amount_pending + $lunch_amount_pending + $dinner_amount_pending - $payment_total_amount;

            $index_amount_arr[] = array(
                'name' => $datas->name,
                'contact_number' => $datas->contact_number,
                'totalamount' => $totalamount,
                'paid' => $paid,
                'pending' => $pending,
                'id' => $datas->id,
            );




            $pdf = Pdf::loadView('pages.backend.customer.exportallcustomerpdf', [
                'index_amount_arr' => $index_amount_arr,
            ]);
            return $pdf->download('AllCustomers.pdf');

        }
    }



    public function export_pendingcustomer_pdf()
    {
       
        
        $today = date('Y-m-d');
        $data = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $index_amount_arr = [];

        foreach ($data as $datas) {

            $breakfastTotamount = BreakFast::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $lunchTotamount = Lunch::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $dinnerTotamount = Dinner::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('bill_amount');

            $breakfast_amount_paid = BreakFast::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $lunch_amount_paid = Lunch::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');
            $dinner_amount_paid = Dinner::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('bill_amount');

            $breakfast_amount_pending = BreakFast::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $lunch_amount_pending = Lunch::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
            $dinner_amount_pending = Dinner::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');

            $payment_total_amount = Payment::where('customer_id', '=', $datas->id)->where('soft_delete', '!=', 1)->sum('amount');

            //Total
            $totalamount = $breakfastTotamount + $lunchTotamount + $dinnerTotamount;
            $paid = $breakfast_amount_paid + $lunch_amount_paid + $dinner_amount_paid + $payment_total_amount;
            $pending = $breakfast_amount_pending + $lunch_amount_pending + $dinner_amount_pending - $payment_total_amount;

            $index_amount_arr[] = array(
                'name' => $datas->name,
                'contact_number' => $datas->contact_number,
                'totalamount' => $totalamount,
                'paid' => $paid,
                'pending' => $pending,
                'id' => $datas->id,
            );



            $pdf = Pdf::loadView('pages.backend.customer.export_pendingcustomer_pdf', [
                'index_amount_arr' => $index_amount_arr,
            ]);
            return $pdf->download('AllCustomers.pdf');

        }
    }





}
