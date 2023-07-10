<?php

namespace App\Http\Controllers;

use App\Models\Outdoor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;


class OutdoorController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->get();

        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();
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
        $data->note = $request->get('note');
        $data->field_title_1 = $request->get('field_title_1');
        $data->field_unit_1 = $request->get('field_unit_1');
        $data->field_unit_price_1 = $request->get('field_unit_price_1');
        $data->field_total_1 = $request->get('field_total_1');
        $data->field_title_2 = $request->get('field_title_2');
        $data->field_unit_2 = $request->get('field_unit_2');
        $data->field_unit_price_2 = $request->get('field_unit_price_2');
        $data->field_total_2 = $request->get('field_total_2');
        $data->field_title_3 = $request->get('field_title_3');
        $data->field_unit_3 = $request->get('field_unit_3');
        $data->field_unit_price_3 = $request->get('field_unit_price_3');
        $data->field_total_3 = $request->get('field_total_3');
        $data->field_title_4 = $request->get('field_title_4');
        $data->field_unit_4 = $request->get('field_unit_4');
        $data->field_unit_price_4 = $request->get('field_unit_price_4');
        $data->field_total_4 = $request->get('field_total_4');
        $data->field_title_5 = $request->get('field_title_5');
        $data->field_unit_5 = $request->get('field_unit_5');
        $data->field_unit_price_5 = $request->get('field_unit_price_5');
        $data->field_total_5 = $request->get('field_total_5');
        $data->field_title_6 = $request->get('field_title_6');
        $data->field_unit_6 = $request->get('field_unit_6');
        $data->field_unit_price_6 = $request->get('field_unit_price_6');
        $data->field_total_6 = $request->get('field_total_6');
        $data->field_title_7 = $request->get('field_title_7');
        $data->field_unit_7 = $request->get('field_unit_7');
        $data->field_unit_price_7 = $request->get('field_unit_price_7');
        $data->field_total_7 = $request->get('field_total_7');
        $data->field_title_8 = $request->get('field_title_8');
        $data->field_unit_8 = $request->get('field_unit_8');
        $data->field_unit_price_8 = $request->get('field_unit_price_8');
        $data->field_total_8 = $request->get('field_total_8');
        $data->field_title_9 = $request->get('field_title_9');
        $data->field_unit_9 = $request->get('field_unit_9');
        $data->field_unit_price_9 = $request->get('field_unit_price_9');
        $data->field_total_9 = $request->get('field_total_9');
        $data->field_title_10 = $request->get('field_title_10');
        $data->field_unit_10 = $request->get('field_unit_10');
        $data->field_unit_price_10 = $request->get('field_unit_price_10');
        $data->field_total_10 = $request->get('field_total_10');
        $data->over_all_total = $request->get('over_all_total');

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
        $data->note = $request->get('note');
        $data->field_title_1 = $request->get('field_title_1');
        $data->field_unit_1 = $request->get('field_unit_1');
        $data->field_unit_price_1 = $request->get('field_unit_price_1');
        $data->field_total_1 = $request->get('field_total_1');
        $data->field_title_2 = $request->get('field_title_2');
        $data->field_unit_2 = $request->get('field_unit_2');
        $data->field_unit_price_2 = $request->get('field_unit_price_2');
        $data->field_total_2 = $request->get('field_total_2');
        $data->field_title_3 = $request->get('field_title_3');
        $data->field_unit_3 = $request->get('field_unit_3');
        $data->field_unit_price_3 = $request->get('field_unit_price_3');
        $data->field_total_3 = $request->get('field_total_3');
        $data->field_title_4 = $request->get('field_title_4');
        $data->field_unit_4 = $request->get('field_unit_4');
        $data->field_unit_price_4 = $request->get('field_unit_price_4');
        $data->field_total_4 = $request->get('field_total_4');
        $data->field_title_5 = $request->get('field_title_5');
        $data->field_unit_5 = $request->get('field_unit_5');
        $data->field_unit_price_5 = $request->get('field_unit_price_5');
        $data->field_total_5 = $request->get('field_total_5');
        $data->field_title_6 = $request->get('field_title_6');
        $data->field_unit_6 = $request->get('field_unit_6');
        $data->field_unit_price_6 = $request->get('field_unit_price_6');
        $data->field_total_6 = $request->get('field_total_6');
        $data->field_title_7 = $request->get('field_title_7');
        $data->field_unit_7 = $request->get('field_unit_7');
        $data->field_unit_price_7 = $request->get('field_unit_price_7');
        $data->field_total_7 = $request->get('field_total_7');
        $data->field_title_8 = $request->get('field_title_8');
        $data->field_unit_8 = $request->get('field_unit_8');
        $data->field_unit_price_8 = $request->get('field_unit_price_8');
        $data->field_total_8 = $request->get('field_total_8');
        $data->field_title_9 = $request->get('field_title_9');
        $data->field_unit_9 = $request->get('field_unit_9');
        $data->field_unit_price_9 = $request->get('field_unit_price_9');
        $data->field_total_9 = $request->get('field_total_9');
        $data->field_title_10 = $request->get('field_title_10');
        $data->field_unit_10 = $request->get('field_unit_10');
        $data->field_unit_price_10 = $request->get('field_unit_price_10');
        $data->field_total_10 = $request->get('field_total_10');
        $data->over_all_total = $request->get('over_all_total');

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



    public function outdoor_export($id)
    {
       
        
        $today = date('Y-m-d');
        $data = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->get();
        $index_arr = [];

        foreach ($data as $datas) {

            

            $index_arr[] = array(
                'name' => $datas->name,
                'contact_number' => $datas->contact_number,
                'address' => $datas->address,
                'booking_date' => $datas->booking_date,
                'delivery_date' => $datas->delivery_date,
                'delivery_date' => $datas->delivery_date,
                'delivery_date' => $datas->delivery_date,
                'id' => $datas->id,
            );


            $outdoordata = Outdoor::findOrFail($id);
            $pdf = Pdf::loadView('pages.backend.outdoor.outdoor_export_pdf', [
                'index_arr' => $index_arr,
                'outdoor_name' => $outdoordata->name,
            ]);
            
            $name = $outdoordata->name . '_outdoor.' . 'pdf';
            return $pdf->download('.pdf');

        }
    }
}
