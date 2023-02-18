<?php

namespace App\Http\Controllers;

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
        $breakfast_amount_pending = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('payment_amount');
        $lunch_amount_pending = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('payment_amount');
        $dinner_amount_pending = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '=', 'Pending')->sum('payment_amount');
        $breakfast_amount_paid = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('payment_amount');
        $lunch_amount_paid = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('payment_amount');
        $dinner_amount_paid = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->where('payment_method', '!=', 'Pending')->sum('payment_amount');
        $breakfast_total_amount = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('payment_amount');
        $lunch_total_amount = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('payment_amount');
        $dinner_total_amount = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('payment_amount');
        $breakfast_total_count = BreakFast::where('date', '=', $today)->where('soft_delete', '!=', 1)->count();
        $lunch_total_count = Lunch::where('date', '=', $today)->where('soft_delete', '!=', 1)->count();
        $dinner_total_count = Dinner::where('date', '=', $today)->where('soft_delete', '!=', 1)->count();
        $expence_total_amount = Expence::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('amount');
        $income_total_amount = Payment::where('date', '=', $today)->where('soft_delete', '!=', 1)->sum('amount');

        return view('home', compact('breakfast_amount_pending', 'lunch_amount_pending', 'dinner_amount_pending', 'breakfast_amount_paid', 'lunch_amount_paid', 'dinner_amount_paid', 'breakfast_total_amount', 'lunch_total_amount', 'dinner_total_amount', 'breakfast_total_count', 'lunch_total_count', 'dinner_total_count', 'expence_total_amount', 'income_total_amount'));
    }
}
