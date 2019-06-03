<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMetroStationRequest;
use App\Http\Requests\StoreMetroStationRequest;
use App\Http\Requests\UpdateMetroStationRequest;
use App\MetroStation;

class MetroStationController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('metro_station_access'), 403);

        $metroStations = MetroStation::all();

        return view('admin.metroStations.index', compact('metroStations'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('metro_station_create'), 403);

        return view('admin.metroStations.create');
    }

    public function store(StoreMetroStationRequest $request)
    {
        abort_unless(\Gate::allows('metro_station_create'), 403);

        $metroStation = MetroStation::create($request->all());

        return redirect()->route('admin.metro-stations.index');
    }

    public function edit(MetroStation $metroStation)
    {
        abort_unless(\Gate::allows('metro_station_edit'), 403);

        return view('admin.metroStations.edit', compact('metroStation'));
    }

    public function update(UpdateMetroStationRequest $request, MetroStation $metroStation)
    {
        abort_unless(\Gate::allows('metro_station_edit'), 403);

        $metroStation->update($request->all());

        return redirect()->route('admin.metro-stations.index');
    }

    public function destroy(MetroStation $metroStation)
    {
        abort_unless(\Gate::allows('metro_station_delete'), 403);

        $metroStation->delete();

        return back();
    }

    public function massDestroy(MassDestroyMetroStationRequest $request)
    {
        MetroStation::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
