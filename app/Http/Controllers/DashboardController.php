<?php

namespace App\Http\Controllers;

use App\Models\AccountOpen;
use App\Models\BreakFast;
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
        $today = Carbon::now()->format('Y-m-d');
        $breakfast_data_ps_pending = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_status', '!=', 'Payed')->sum('bill_amount');
        $lunch_data_ps_pending = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_status', '!=', 'Payed')->sum('bill_amount');
        $dinner_data_ps_pending = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_status', '!=', 'Payed')->sum('bill_amount');
        $breakfast_data_pm_wallet = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Wallet')->where('payment_status', '=', 'Payed')->sum('bill_amount');
        $lunch_data_pm_wallet = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Wallet')->where('payment_status', '=', 'Payed')->sum('bill_amount');
        $dinner_data_pm_wallet = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Wallet')->where('payment_status', '=', 'Payed')->sum('bill_amount');
        $opening = AccountOpen::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('amount');
        $expense = Expence::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('amount');
        $payment = Payment::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('amount');

        return view('home', compact('today', 'breakfast_data_ps_pending', 'lunch_data_ps_pending', 'dinner_data_ps_pending', 'breakfast_data_pm_wallet', 'lunch_data_pm_wallet', 'dinner_data_pm_wallet', 'opening', 'expense', 'payment'));
    }
}
