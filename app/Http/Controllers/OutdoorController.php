<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Outdoor;
use App\Models\OutdoorDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;


class OutdoorController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->get();
        $OutdoorData = OutdoorDetail::where('soft_delete', '!=', 1)->get();

        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();
        $notificationdetails = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->where('delivery_date', '=', $today)->get();

        return view('pages.backend.outdoor.index', compact('data', 'today', 'notificationcount', 'notificationdetails', 'OutdoorData'));
    }

    public function create()
    {
        $today = Carbon::now()->format('Y-m-d');

        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->whereDate('delivery_date', '=', $today)->count();
        $notificationdetails = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->where('delivery_date', '=', $today)->get();

        return view('pages.backend.outdoor.create', compact('today', 'notificationcount', 'notificationdetails'));
    }

    public function store(Request $request)
    {
        $data = new Outdoor();

        $data->name = $request->get('name');
        $data->contact_number = $request->get('contact_number');
        $data->address = $request->get('address');
        $data->booking_date = $request->get('booking_date');
        $data->delivery_date = $request->get('delivery_date');
        $data->delivery_time = $request->get('delivery_time');
        $data->note = $request->get('note');
        $data->over_all_total = $request->get('over_all_total');

        $data->save();
        $outdoor_id = $data->id;

        foreach ($request->get('outdoor_product') as $key => $outdoor_product) {

            $OutdoorDetail = new OutdoorDetail;
            $OutdoorDetail->outdoor_id = $outdoor_id;
            $OutdoorDetail->outdoor_product = $outdoor_product;
            $OutdoorDetail->outdoor_unit = $request->outdoor_unit[$key];
            $OutdoorDetail->outdoor_price = $request->outdoor_price[$key];
            $OutdoorDetail->outdoor_total = $request->outdoor_total[$key];
            $OutdoorDetail->save();
        }

        return redirect()->route('outdoor.index')->with('index', 'Successful added a new outdoor record !');
    }

    public function edit($id)
    {
        $data = Outdoor::findOrFail($id);
        $OutdoorData = OutdoorDetail::where('outdoor_id', '=', $id)->get();
        $today = Carbon::now();

        return view('pages.backend.outdoor.edit', compact('data', 'today', 'OutdoorData'));
    }

    public function update(Request $request, $id)
    {
        $data = Outdoor::findOrFail($id);

        $data->name = $request->get('name');
        $data->contact_number = $request->get('contact_number');
        $data->address = $request->get('address');
        $data->booking_date = $request->get('booking_date');
        $data->delivery_date = $request->get('delivery_date');
        $data->delivery_time = $request->get('delivery_time');
        $data->note = $request->get('note');
        $data->over_all_total = $request->get('over_all_total');

        $data->update();


        $getinsertedOutdoors = OutdoorDetail::where('outdoor_id', '=', $id)->get();
        $OutdoorProducts = array();
        foreach ($getinsertedOutdoors as $key => $getinsertedOutdoor) {
            $OutdoorProducts[] = $getinsertedOutdoor->id;
        }
        $updatedoutdoor = $request->outdoor_detailid;
        $updatedoutdoors = array_filter($updatedoutdoor);
        $different_ids = array_merge(array_diff($OutdoorProducts, $updatedoutdoors), array_diff($updatedoutdoors, $OutdoorProducts));

        if (!empty($different_ids)) {
            foreach ($different_ids as $key => $different_id) {
                OutdoorDetail::where('id', $different_id)->delete();
            }
        }



        foreach ($request->get('outdoor_detailid') as $key => $outdoor_detailid) {
            if ($outdoor_detailid > 0) {
                $ids = $outdoor_detailid;
                $Outdoor_ID = $id;
                $outdoor_product = $request->outdoor_product[$key];
                $outdoor_unit = $request->outdoor_unit[$key];
                $outdoor_price = $request->outdoor_price[$key];
                $outdoor_total = $request->outdoor_total[$key];

                DB::table('outdoor_details')->where('id', $ids)->update([
                    'outdoor_id' => $Outdoor_ID,  'outdoor_product' => $outdoor_product,  'outdoor_unit' => $outdoor_unit,  'outdoor_price' => $outdoor_price, 'outdoor_total' => $outdoor_total
                ]);
            } else if ($outdoor_detailid == '') {
                if ($request->outdoor_product[$key] > 0) {


                    $OutdoorDetail = new OutdoorDetail;
                    $OutdoorDetail->outdoor_id = $id;
                    $OutdoorDetail->outdoor_product = $request->outdoor_product[$key];
                    $OutdoorDetail->outdoor_unit = $request->outdoor_unit[$key];
                    $OutdoorDetail->outdoor_price = $request->outdoor_price[$key];
                    $OutdoorDetail->outdoor_total = $request->outdoor_total[$key];
                    $OutdoorDetail->save();

                }
            }
        }

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
        $data = Outdoor::findOrFail($id);
        $OutdoorData = OutdoorDetail::where('outdoor_id', '=', $id)->get();
        $index_arr = [];

        foreach ($OutdoorData as $OutdoorDatas) {

            $index_arr[] = array(
                'outdoor_product' => $OutdoorDatas->outdoor_product,
                'outdoor_unit' => $OutdoorDatas->outdoor_unit,
                'outdoor_price' => $OutdoorDatas->outdoor_price,
                'outdoor_total' => $OutdoorDatas->outdoor_total,
                'id' => $data->id,
            );

            // return view('pages.backend.outdoor.outdoor_export_pdf', compact('index_arr'));



        }


            $pdf = Pdf::loadView('pages.backend.outdoor.outdoor_export_pdf', [
                'index_arr' => $index_arr,
                'outdoor_name' => $data->name,
                'contact_number' => $data->contact_number,
                'address' => $data->address,
                'booking_date' => $data->booking_date,
                'delivery_date' => $data->delivery_date,
                'delivery_time' => $data->delivery_time,
                'note' => $data->note,
            ]);

            $name = $data->name . '_outdoor.' . 'pdf';
            return $pdf->download('.pdf');
    }
}
