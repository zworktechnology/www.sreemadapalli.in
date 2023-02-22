<?php

namespace App\Http\Controllers;

use App\Models\BreakFast;
use App\Models\Customer;
use App\Models\Dinner;
use App\Models\Lunch;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::where('soft_delete', '!=', 1)->get();
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



        // Datewise Customer's order
        $GetBreakfastData = BreakFast::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->get();
        $Breakfast_Date_arr = [];
        foreach ($GetBreakfastData as $key => $GetBreakfastDatas) {
            $Breakfast_Date_arr[] = $GetBreakfastDatas->date;
        }

        $GetLunchData = Lunch::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->get();
        $Lunch_Date_arr = [];
        foreach ($GetLunchData as $key => $GetLunchDatas) {
            $Lunch_Date_arr[] = $GetLunchDatas->date;
        }

        $GetDinnerData = Dinner::where('customer_id', '=', $data->id)->where('soft_delete', '!=', 1)->get();
        $Dinner_Date_arr = [];
        foreach ($GetDinnerData as $key => $GetDinnerDatas) {
            $Dinner_Date_arr[] = $GetDinnerDatas->date;
        }

        $merging_Data = array_merge($Breakfast_Date_arr, $Lunch_Date_arr, $Dinner_Date_arr);
        usort($merging_Data, function ($a, $b) {
            $dateTimestamp1 = strtotime($a);
            $dateTimestamp2 = strtotime($b);

            return $dateTimestamp1 - $dateTimestamp2;
        });

        foreach (array_unique($merging_Data) as $key => $merging_Datas) {


            $CustomersBreakfastAmt = BreakFast::where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $CustomersLunchAmt = Lunch::where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $CustomersDinnerAmt = Dinner::where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $TotalAmount = $CustomersBreakfastAmt + $CustomersLunchAmt + $CustomersDinnerAmt;

            $Custumer_index_array[] = array(
                'date' => date('d-m-Y', strtotime($merging_Datas)),
                'CustomersBreakfastAmt' => $CustomersBreakfastAmt,
                'CustomersLunchAmt' => $CustomersLunchAmt,
                'CustomersDinnerAmt' => $CustomersDinnerAmt,
                'TotalAmount' => $TotalAmount,
                'customer_id' => $data->id,
            );

        }


        return view('pages.backend.customer.view', compact('data', 'breakfast_amount_pending', 'lunch_amount_pending', 'dinner_amount_pending', 'breakfast_amount_paid', 'lunch_amount_paid', 'dinner_amount_paid', 'breakfast_total_amount', 'lunch_total_amount', 'dinner_total_amount', 'payment', 'payment_total_amount', 'Custumer_index_array'));
    }


    public function export_customerorder_pdf($id) 
    {
        

        $GetBreakfastData = BreakFast::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->get();
        $Breakfast_Date_arr = [];
        foreach ($GetBreakfastData as $key => $GetBreakfastDatas) {
            $Breakfast_Date_arr[] = $GetBreakfastDatas->date;
        }

        $GetLunchData = Lunch::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->get();
        $Lunch_Date_arr = [];
        foreach ($GetLunchData as $key => $GetLunchDatas) {
            $Lunch_Date_arr[] = $GetLunchDatas->date;
        }

        $GetDinnerData = Dinner::where('customer_id', '=', $id)->where('soft_delete', '!=', 1)->get();
        $Dinner_Date_arr = [];
        foreach ($GetDinnerData as $key => $GetDinnerDatas) {
            $Dinner_Date_arr[] = $GetDinnerDatas->date;
        }

        $merging_Data = array_merge($Breakfast_Date_arr, $Lunch_Date_arr, $Dinner_Date_arr);
        usort($merging_Data, function ($a, $b) {
            $dateTimestamp1 = strtotime($a);
            $dateTimestamp2 = strtotime($b);

            return $dateTimestamp1 - $dateTimestamp2;
        });

        foreach (array_unique($merging_Data) as $key => $merging_Datas) {


            $CustomersBreakfastAmt = BreakFast::where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $CustomersLunchAmt = Lunch::where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $CustomersDinnerAmt = Dinner::where('date', '=', $merging_Datas)->where('soft_delete', '!=', 1)->sum('bill_amount');
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

        $pdf = Pdf::loadView('pages.backend.customer.exportpdf', [
            'Custumer_pdf_array' => $Custumer_pdf_array,
            'customerdata' => $customerdata,
        ]);
        return $pdf->download('exportpdf.pdf');
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



    public function getdatewiseCustomerOrders()
    {
        $from_date = request()->get('from_date');
        $to_date = request()->get('to_date');
        $customer_id = request()->get('customer_id');

//Get Breakfast Dates
        $Breakfast_datearr = BreakFast::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->get();
        $Breakfast_datearray = [];
        foreach ($Breakfast_datearr as $key => $Breakfast_datearrs) {
            $Breakfast_datearray[] = $Breakfast_datearrs->date;
        }

//Get Lunch Dates
        $Lunch_datearr = Lunch::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->get();
        $Lunch_datearray = [];
        foreach ($Lunch_datearr as $key => $Lunch_datearrs) {
            $Lunch_datearray[] = $Lunch_datearrs->date;
        }

//Get Dinner Dates
        $Dinner_datearr = Dinner::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->get();
        $Dinner_datearray = [];
        foreach ($Dinner_datearr as $key => $Dinner_datearrs) {
            $Lunch_datearray[] = $Dinner_datearrs->date;
        }


        $merging_Datearr = array_merge($Breakfast_datearray, $Lunch_datearray, $Lunch_datearray);
        usort($merging_Datearr, function ($a, $b) {
            $dateTimestamp1 = strtotime($a);
            $dateTimestamp2 = strtotime($b);

            return $dateTimestamp1 - $dateTimestamp2;
        });

        foreach (array_unique($merging_Datearr) as $key => $merging_Datearray) {

            $BreakfastAmount = BreakFast::where('date', '=', $merging_Datearray)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $LunchAmount = Lunch::where('date', '=', $merging_Datearray)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $DinnerAmount = Dinner::where('date', '=', $merging_Datearray)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $TotalCustomerAmount = $BreakfastAmount + $LunchAmount + $DinnerAmount;
            

            $Custumer_filter_array[] = array(
                'date' => date('d-m-Y', strtotime($merging_Datearray)),
                'BreakfastAmount' => $BreakfastAmount,
                'LunchAmount' => $LunchAmount,
                'DinnerAmount' => $DinnerAmount,
                'TotalCustomerAmount' => $TotalCustomerAmount
            );
        }

        if (isset($Custumer_filter_array) & !empty($Custumer_filter_array)) {
            echo json_encode($Custumer_filter_array);
        }else{
            echo json_encode(
                array('status' => 'false')
            );
        }

    }






    public function filtercustomerorders(Request $request)
    {

        $from_date = request()->get('from_date');
        $to_date = request()->get('to_date');
        $customer_id = request()->get('customer_id');

//Get Breakfast Dates
        $Breakfast_datearr = BreakFast::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->get();
        $Breakfast_datearray = [];
        foreach ($Breakfast_datearr as $key => $Breakfast_datearrs) {
            $Breakfast_datearray[] = $Breakfast_datearrs->date;
        }

//Get Lunch Dates
        $Lunch_datearr = Lunch::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->get();
        $Lunch_datearray = [];
        foreach ($Lunch_datearr as $key => $Lunch_datearrs) {
            $Lunch_datearray[] = $Lunch_datearrs->date;
        }

//Get Dinner Dates
        $Dinner_datearr = Dinner::whereBetween('date', [$from_date, $to_date])->where('customer_id', '=', $customer_id)->where('soft_delete', '!=', 1)->get();
        $Dinner_datearray = [];
        foreach ($Dinner_datearr as $key => $Dinner_datearrs) {
            $Lunch_datearray[] = $Dinner_datearrs->date;
        }


        $merging_Datearr = array_merge($Breakfast_datearray, $Lunch_datearray, $Lunch_datearray);
        usort($merging_Datearr, function ($a, $b) {
            $dateTimestamp1 = strtotime($a);
            $dateTimestamp2 = strtotime($b);

            return $dateTimestamp1 - $dateTimestamp2;
        });

        foreach (array_unique($merging_Datearr) as $key => $merging_Datearray) {

            $CustomersBreakfastAmt = BreakFast::where('date', '=', $merging_Datearray)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $CustomersLunchAmt = Lunch::where('date', '=', $merging_Datearray)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $CustomersDinnerAmt = Dinner::where('date', '=', $merging_Datearray)->where('soft_delete', '!=', 1)->sum('bill_amount');
            $TotalAmount = $CustomersBreakfastAmt + $CustomersLunchAmt + $CustomersDinnerAmt;
            

            $Custumer_pdf_array[] = array(
                'date' => date('d-m-Y', strtotime($merging_Datearray)),
                'CustomersBreakfastAmt' => $CustomersBreakfastAmt,
                'CustomersLunchAmt' => $CustomersLunchAmt,
                'CustomersDinnerAmt' => $CustomersDinnerAmt,
                'TotalAmount' => $TotalAmount
            );
        }

        


        $customerdata = Customer::findOrFail($customer_id);

        $pdf = Pdf::loadView('pages.backend.customer.exportfipdf', [
            'Custumer_pdf_array' => $Custumer_pdf_array,
            'customerdata' => $customerdata,
        ]);
        return $pdf->download('exportpdf.pdf');
    }

}
