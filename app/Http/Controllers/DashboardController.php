<?php

namespace App\Http\Controllers;

use App\Models\AccountClose;
use App\Models\AccountOpen;
use App\Models\BreakFast;
use App\Models\Determination;
use App\Models\Dinner;
use App\Models\Expence;
use App\Models\Lunch;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');
        $breakfast_data_ps_pending = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $lunch_data_ps_pending = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $dinner_data_ps_pending = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');

        $opening = AccountOpen::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('amount');

        $expense = Expence::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('amount');

        $payment = Payment::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('amount');

        $g_pay = AccountClose::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('g_pay');
        $g_pay_business = AccountClose::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('g_pay_business');
        $phone_pay = AccountClose::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('phone_pay');
        $card = AccountClose::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('card');
        $other_case = AccountClose::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('other_case');
        $sales_amount = AccountClose::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('sales_amount');
        $paytm = AccountClose::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('case_on_hand');

        $determination = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $total_2000 = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('total_2000');
        $total_500 = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('total_500');
        $total_200 = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('total_200');
        $total_100 = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('total_100');
        $total_50 = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('total_50');
        $total_20 = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('total_20');
        $total_10 = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('total_10');
        $total_5 = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('total_5');
        $total_2 = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('total_2');
        $total_1 = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('total_1');


        $opendate = AccountOpen::where('date', '=', $today)->where('soft_delete', '!=', 1)->get('id');
        $closedate = AccountClose::where('date', '=', $today)->where('soft_delete', '!=', 1)->get('id');
        $determinationdate = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->get('id');

        return view('home', compact('today', 'breakfast_data_ps_pending',
        'lunch_data_ps_pending', 'dinner_data_ps_pending', 'opening', 'expense', 'payment',
        'g_pay', 'g_pay_business', 'phone_pay', 'card', 'other_case', 'sales_amount', 'determination',
        'total_2000', 'total_500', 'total_200', 'total_100', 'total_50', 'total_20', 'total_10',
        'total_5', 'total_2', 'total_1', 'opendate', 'closedate', 'determinationdate', 'paytm'));
    }




    public function getDashboardData()
    {
        $dashboarddate = request()->get('dashboarddate');

        $breakfast_data_ps_pending = BreakFast::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $lunch_data_ps_pending = Lunch::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');
        $dinner_data_ps_pending = Dinner::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('bill_amount');

        $opening = AccountOpen::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('amount');

        $expense = Expence::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('amount');

        $payment = Payment::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('amount');

        $g_pay = AccountClose::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('g_pay');
        $g_pay_business = AccountClose::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('g_pay_business');
        $phone_pay = AccountClose::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('phone_pay');
        $card = AccountClose::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('card');
        $other_case = AccountClose::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('other_case');
        $sales_amount = AccountClose::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('sales_amount');


        $total_2000 = Determination::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('total_2000');
        $total_500 = Determination::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('total_500');
        $total_200 = Determination::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('total_200');
        $total_100 = Determination::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('total_100');
        $total_50 = Determination::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('total_50');
        $total_20 = Determination::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('total_20');
        $total_10 = Determination::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('total_10');
        $total_5 = Determination::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('total_5');
        $total_2 = Determination::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('total_2');
        $total_1 = Determination::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->sum('total_1');




        // Array Data

        $cashonhand = $total_2000 + $total_500 + $total_200 + $total_100 + $total_50 + $total_20 + $total_10 + $total_5 + $total_2 + $total_1;
        $pendingBill = $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending;
        $otherCash = $payment + $other_case;
        $totalAmount = ($total_2000 + $total_500 + $total_200 + $total_100 + $total_50 + $total_20 + $total_10 + $total_5 + $total_2 + $total_1) + $g_pay + $phone_pay + $card + $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending + $g_pay_business + $payment + $other_case;
        $totalopening_sales = $opening + $sales_amount;
        $p_total = ($opening + $sales_amount) - $expense;
        $overall_amt = (($total_2000 + $total_500 + $total_200 + $total_100 + $total_50 + $total_20 + $total_10 + $total_5 + $total_2 + $total_1) + $g_pay + $phone_pay + $card + $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending + $g_pay_business + $payment + $other_case) - (($opening + $sales_amount) - $expense);


            $DashboardArray[] = array(
                'cashonhand' => $cashonhand,
                'pendingBill' => $pendingBill,
                'g_pay' => $g_pay,
                'g_pay_business' => $g_pay_business,
                'phone_pay' => $phone_pay,
                'debitorcredit_card' => $card,
                'otherCash' => $otherCash,
                'totalAmount' => $totalAmount,
                'opening' => $opening,
                'sales_amount' => $sales_amount,
                'totalopening_sales' => $totalopening_sales,
                'expense' => $expense,
                'p_total' => $p_total,
                'overall_amt' => $overall_amt,
            );

        if (isset($DashboardArray) & !empty($DashboardArray)) {
            echo json_encode($DashboardArray);
        }else{
            echo json_encode(
                array('status' => 'false')
            );
        }


    }




    public function getDenomination()
    {
        $dashboarddate = request()->get('dashboarddate');


        $determination = Determination::where('date', '=', $dashboarddate)->where('soft_delete', '!=', 1)->get();
        foreach ($determination as $key => $determinations) {

            $all_amount_count = $determinations->total_2000 + $determinations->total_500 + $determinations->total_200 + $determinations->total_100 + $determinations->total_50 + $determinations->total_20 + $determinations->total_10 + $determinations->total_5 + $determinations->total_2 + $determinations->total_1;


            $DashboardDenominationArray[] = array(
                'count2000' => $determinations->count_2000,
                'total_2000' => $determinations->total_2000,
                'count500' => $determinations->count_500,
                'total_500' => $determinations->total_500,
                'count200' => $determinations->count_200,
                'total_200' => $determinations->total_200,
                'count100' => $determinations->count_100,
                'total_100' => $determinations->total_100,
                'count50' => $determinations->count_50,
                'total_50' => $determinations->total_50,
                'count20' => $determinations->count_20,
                'total_20' => $determinations->total_20,
                'count10' => $determinations->count_10,
                'total_10' => $determinations->total_10,
                'count5' => $determinations->count_5,
                'total_5' => $determinations->total_5,
                'count2' => $determinations->count_2,
                'total_2' => $determinations->total_2,
                'count1' => $determinations->count_1,
                'total_1' => $determinations->total_1,
                'all_amount_count' => $all_amount_count
            );
        }






        if (isset($DashboardDenominationArray) & !empty($DashboardDenominationArray)) {
            echo json_encode($DashboardDenominationArray);
        }else{
            echo json_encode(
                array('status' => 'false')
            );
        }


    }
}
