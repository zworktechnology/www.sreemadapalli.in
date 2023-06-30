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
        $datas = Wallet::where('soft_delete', '!=', 1)->where('date', '=', $today)->get()->all();
        $customer = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();

        $wallet_paid = Wallet::where('soft_delete', '!=', 1)->where('status', '=', 1)->where('date', '=', $today)->sum('amount');
        $wallet_pending = Wallet::where('soft_delete', '!=', 1)->where('status', '=', 0)->where('date', '=', $today)->sum('amount');


        // $notificationcount = Output::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();

        return view('pages.backend.wallet.index', compact('data', 'today', 'customer', 'wallet_paid', 'wallet_pending', 'datas'));
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

    public function pending($id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Wallet::findOrFail($id);

        $data->status = 0;
        $data->paid_date = $today;

        $data->update();

        return redirect()->back()->with('update', 'Status updated !');
    }

    public function edit($id)
    {
        $data = Wallet::findOrFail($id);
        $customer = Customer::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();

        return view('pages.backend.wallet.edit', compact('data', 'customer'));
    }

    public function update(Request $request, $id)
    {
        $data = Wallet::findOrFail($id);

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');
        $data->customer_id = $request->get('customer_id');

        $data->update();

        return redirect()->route('wallet.index')->with('update', 'Wallet detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Wallet::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('wallet.index')->with('soft_destroy', 'Successfully deleted the wallet !');
    }
}
