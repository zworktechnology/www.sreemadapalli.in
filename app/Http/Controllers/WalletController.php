<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Symfony\Component\Console\Output\Output;

class WalletController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Wallet::where('soft_delete', '!=', 1)->where('status', '!=', 1)->get()->all();
        $customer = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();

        // $notificationcount = Output::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();

        return view('pages.backend.wallet.index', compact('data', 'today', 'customer'));
    }

    public function store(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');

        $data = new Wallet();

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->status = $request->get('status');
        $data->customer_id = $request->get('customer_id');
        $data->paid_date = $today;

        $data->save();

        return redirect()->back()->with('add', 'Successful addition of a new wallet payment !');
    }

    public function paid($id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Wallet::findOrFail($id);

        $data->status = 1;
        $data->paid_date = $today;

        $data->update();

        return redirect()->back()->with('update', 'Status updated !');
    }
}
