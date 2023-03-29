<?php

namespace App\Http\Controllers;

use App\Models\Determination;
use Illuminate\Http\Request;
use App\Models\Outdoor;
use Carbon\Carbon;

class DeterminationController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $data = Determination::where('date', '=', $today)->where('soft_delete', '!=', 1)->get();
        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->where('delivery_date', '=', $today)->count();

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

        $total = $total_2000 + $total_500 + $total_200 + $total_100 + $total_50 + $total_20 + $total_10 + $total_5 + $total_2 + $total_1;

        return view('pages.backend.determination.index', compact('notificationcount', 'data', 'today', 'total'));
    }

    public function dailyfilter(Request $request)
    {
        $daily_date = $request->get('date');
        $data = Determination::where('soft_delete', '!=', 1)->where('date', '=', $daily_date)->get();
        $notificationcount = Outdoor::where('soft_delete', '!=', 1)->where('status', '!=', 1)->where('delivery_date', '=', $today)->count();

        $total_2000 = Determination::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->sum('total_2000');
        $total_500 = Determination::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->sum('total_500');
        $total_200 = Determination::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->sum('total_200');
        $total_100 = Determination::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->sum('total_100');
        $total_50 = Determination::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->sum('total_50');
        $total_20 = Determination::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->sum('total_20');
        $total_10 = Determination::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->sum('total_10');
        $total_5 = Determination::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->sum('total_5');
        $total_2 = Determination::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->sum('total_2');
        $total_1 = Determination::where('date', '=', $daily_date)->where('soft_delete', '!=', 1)->sum('total_1');

        $total = $total_2000 + $total_500 + $total_200 + $total_100 + $total_50 + $total_20 + $total_10 + $total_5 + $total_2 + $total_1;

        return view('pages.backend.determination.dailyfilter', compact('notificationcount', 'data', 'daily_date', 'total'));
    }

    public function store(Request $request)
    {
        $data = new Determination();

        $data->date = $request->get('date');
        $data->count_2000 = $request->get('count_2000');
        $data->total_2000 = $request->get('total_2000');
        $data->count_500 = $request->get('count_500');
        $data->total_500 = $request->get('total_500');
        $data->count_200 = $request->get('count_200');
        $data->total_200 = $request->get('total_200');
        $data->count_100 = $request->get('count_100');
        $data->total_100 = $request->get('total_100');
        $data->count_50 = $request->get('count_50');
        $data->total_50 = $request->get('total_50');
        $data->count_20 = $request->get('count_20');
        $data->total_20 = $request->get('total_20');
        $data->count_10 = $request->get('count_10');
        $data->total_10 = $request->get('total_10');
        $data->count_5 = $request->get('count_5');
        $data->total_5 = $request->get('total_5');
        $data->count_2 = $request->get('count_2');
        $data->total_2 = $request->get('total_2');
        $data->count_1 = $request->get('count_1');
        $data->total_1 = $request->get('total_1');
        $data->total = $request->get('total');

        $data->save();

        return redirect()->route('home')->with('add', 'Successful addition of a new determination record !');
    }

    public function edit($id)
    {
        $data = Determination::findOrFail($id);

        return view('pages.backend.determination.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Determination::findOrFail($id);

        $data->date = $request->get('date');
        $data->count_2000 = $request->get('count_2000');
        $data->total_2000 = $request->get('total_2000');
        $data->count_500 = $request->get('count_500');
        $data->total_500 = $request->get('total_500');
        $data->count_200 = $request->get('count_200');
        $data->total_200 = $request->get('total_200');
        $data->count_100 = $request->get('count_100');
        $data->total_100 = $request->get('total_100');
        $data->count_50 = $request->get('count_50');
        $data->total_50 = $request->get('total_50');
        $data->count_20 = $request->get('count_20');
        $data->total_20 = $request->get('total_20');
        $data->count_10 = $request->get('count_10');
        $data->total_10 = $request->get('total_10');
        $data->count_5 = $request->get('count_5');
        $data->total_5 = $request->get('total_5');
        $data->count_2 = $request->get('count_2');
        $data->total_2 = $request->get('total_2');
        $data->count_1 = $request->get('count_1');
        $data->total_1 = $request->get('total_1');
        $data->total = $request->get('total');

        $data->update();

        return redirect()->route('determination.index')->with('update', 'Determination record detail successfully changed !');
    }

    public function delete($id)
    {
        $data = Determination::findOrFail($id);

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('determination.index')->with('soft_destroy', 'Successfully deleted the determination record !');
    }

    public function destroy($id)
    {
        $data = Determination::findOrFail($id);

        $data->delete();

        return redirect()->route('determination.index')->with('destroy', 'Successfully erased the determination record !');
    }
}

