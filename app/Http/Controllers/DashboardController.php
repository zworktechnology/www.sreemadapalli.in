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

        $opendate = AccountOpen::where('date', '=', $today)->where('soft_delete', '!=', 1)->get('id');
        $closedate = AccountClose::where('date', '=', $today)->where('soft_delete', '!=', 1)->get('id');
        $determinationdate = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->get('id');


        $open_sales = $opening + $sales_amount;
        $open_sales_exp = (($opening + $sales_amount) - $expense);

        $totaldeterminationdate = $total_2000 + $total_500 + $total_200 + $total_100 + $total_50 + $total_20 + $total_10 + $total_5 + $total_2 + $total_1;
        $total_pending = $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending;
        $total_card_one = $totaldeterminationdate + $g_pay + $phone_pay + $card + $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending + $g_pay_business + $paytm + $payment + $other_case;

        if ($open_sales_exp < 0) {
            $over_all = $open_sales_exp + $total_card_one;
        } else {
            $over_all = $open_sales_exp - $total_card_one;
        }

        return view('home', compact('today', 'breakfast_data_ps_pending',
        'lunch_data_ps_pending', 'dinner_data_ps_pending', 'opening', 'expense', 'payment',
        'g_pay', 'g_pay_business', 'phone_pay', 'card', 'other_case', 'sales_amount', 'determination',
        'total_2000', 'total_500', 'total_200', 'total_100', 'total_50', 'total_20', 'total_10',
        'total_5', 'total_2', 'total_1', 'opendate', 'closedate', 'determinationdate', 'paytm',
        'open_sales', 'open_sales_exp', 'totaldeterminationdate', 'total_pending', 'total_card_one',  'over_all'));
    }


    public function filterindex(Request $request)
    {
        $today = $request->get('date');

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


        $open_sales = $opening + $sales_amount;
        $open_sales_exp = (($opening + $sales_amount) - $expense);

        $totaldeterminationdate = $total_2000 + $total_500 + $total_200 + $total_100 + $total_50 + $total_20 + $total_10 + $total_5 + $total_2 + $total_1;
        $total_pending = $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending;
        $total_card_one = $totaldeterminationdate + $g_pay + $phone_pay + $card + $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending + $g_pay_business + $paytm + $payment + $other_case;

        if ($open_sales_exp < 0) {
            $over_all = $open_sales_exp + $total_card_one;
        } else {
            $over_all = $open_sales_exp - $total_card_one;
        }

        return view('homefilter', compact('today', 'breakfast_data_ps_pending',
        'lunch_data_ps_pending', 'dinner_data_ps_pending', 'opening', 'expense', 'payment',
        'g_pay', 'g_pay_business', 'phone_pay', 'card', 'other_case', 'sales_amount', 'determination',
        'total_2000', 'total_500', 'total_200', 'total_100', 'total_50', 'total_20', 'total_10',
        'total_5', 'total_2', 'total_1', 'opendate', 'closedate', 'determinationdate', 'paytm',
        'open_sales', 'open_sales_exp', 'totaldeterminationdate', 'total_pending', 'total_card_one',  'over_all'));
    }

}
