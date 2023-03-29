<?php

namespace App\Http\Controllers;

use App\Models\Deliveryboy;
use App\Models\Outdoor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DeliveryboyController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Deliveryboy::where('soft_delete', '!=', 1)->orderBy('name')->get()->all();
        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->where('delivery_date', '=', $today)->count();

        return view('pages.backend.deliveryboy.index', compact('data', 'notificationcount'));
    }

    public function store(Request $request)
    {
        $data = new Deliveryboy();

        $data->name = $request->get('name');
        $data->contact_number = $request->get('contact_number');
        $data->email_address = $request->get('email_address');
        $data->address = $request->get('address');

        $uni_id_gen = $request->name;
        $uni_id_gen_one = $uni_id_gen[0];
        $uni_id_gen_two = $uni_id_gen[1];
        $last_customer  = Deliveryboy::orderBy('created_at', 'desc')->first();

        if (isset($last_customer)) {
            $data->unique_id  = $uni_id_gen_one . $uni_id_gen_two . '00' . ($last_customer->id + 1);
        } else {
            $data->unique_id  = $uni_id_gen_one . $uni_id_gen_two . '001';
        }

        $data->save();

        return redirect()->route('deliveryboy.index')->with('add', 'Successful addition of a new deliveryboy !');
    }

    public function edit($id)
    {
        $data = Deliveryboy::findOrFail($id);

        return view('pages.backend.deliveryboy.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Deliveryboy::findOrFail($id);

        $data->name = $request->get('name');
        $data->contact_number = $request->get('contact_number');
        $data->email_address = $request->get('email_address');
        $data->address = $request->get('address');

        $data->update();

        return redirect()->route('deliveryboy.index')->with('update', 'Deliveryboy detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Deliveryboy::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('deliveryboy.index')->with('soft_destroy', 'Successfully deleted the deliveryboy !');
    }

    public function destroy($id)
    {
        $data = Deliveryboy::findOrFail($id);

        $data->delete();

        return redirect()->route('deliveryboy.index')->with('destroy', 'Successfully erased the deliveryboy !');
    }
}
