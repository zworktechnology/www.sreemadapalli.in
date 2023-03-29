<?php

namespace App\Http\Controllers;

use App\Models\Outdoor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OutdoorController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->get();

        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->where('delivery_date', '=', $today)->count();
        $notificationdetails = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->where('delivery_date', '=', $today)->get();

        return view('pages.backend.outdoor.index', compact('data', 'today', 'notificationcount', 'notificationdetails'));
    }

    public function store(Request $request)
    {
        $data = new Outdoor();

        $data->name = $request->get('name');
        $data->contact_number = $request->get('contact_number');
        $data->address = $request->get('address');
        $data->booking_date = $request->get('booking_date');
        $data->delivery_date = $request->get('delivery_date');
        $data->order_note = $request->get('order_note');
        $data->note = $request->get('note');

        $data->save();

        return redirect()->back()->with('add', 'Successful added a new outdoor record !');
    }

    public function edit($id)
    {
        $data = Outdoor::findOrFail($id);
        $today = Carbon::now();

        return view('pages.backend.outdoor.edit', compact('data', 'today'));
    }

    public function update(Request $request, $id)
    {
        $data = Outdoor::findOrFail($id);

        $data->name = $request->get('name');
        $data->contact_number = $request->get('contact_number');
        $data->address = $request->get('address');
        $data->booking_date = $request->get('booking_date');
        $data->delivery_date = $request->get('delivery_date');
        $data->order_note = $request->get('order_note');
        $data->note = $request->get('note');

        $data->update();

        return redirect()->route('outdoor.index')->with('update', 'Outdoor record detail successfully changed !');
    }

    public function delivered($id)
    {
        $data = Outdoor::findOrFail($id);

        $data->status = 1;

        $data->update();

        return redirect()->route('outdoor.index')->with('update', 'Outdoor record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Outdoor::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('outdoor.index')->with('soft_destroy', 'Successfully deleted the outdoor record !');
    }

    public function destroy($id)
    {
        $data = Outdoor::findOrFail($id);

        $data->delete();

        return redirect()->route('outdoor.index')->with('destroy', 'Successfully erased the outdoor record !');
    }
}
