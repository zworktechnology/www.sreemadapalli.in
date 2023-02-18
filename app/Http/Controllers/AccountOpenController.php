<?php

namespace App\Http\Controllers;

use App\Models\AccountOpen;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AccountOpenController extends Controller
{
    public function index()
    {
        $data = AccountOpen::where('soft_delete', '!=', 1)->get();
        $today = Carbon::now()->format('Y-m-d');

        return view('pages.backend.accountopen.index', compact('data', 'today'));
    }

    public function store(Request $request)
    {
        $data = new AccountOpen();

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');

        $data->save();

        return redirect()->route('accountopen.index')->with('add', 'Successful addition of a new accountopen record !');
    }

    public function edit($id)
    {
        $data = AccountOpen::findOrFail($id);

        return view('pages.backend.accountopen.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = AccountOpen::findOrFail($id);

        $data->date = $request->get('date');
        $data->amount = $request->get('amount');

        $data->update();

        return redirect()->route('accountopen.index')->with('update', 'AccountOpen record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = AccountOpen::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('accountopen.index')->with('soft_destroy', 'Successfully deleted the accountopen record !');
    }

    public function destroy($id)
    {
        $data = AccountOpen::findOrFail($id);

        $data->delete();

        return redirect()->route('accountopen.index')->with('destroy', 'Successfully erased the accountopen record !');
    }
}
