<?php

namespace App\Http\Controllers\Admin;

use App\Building;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBuildingRequest;
use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use App\MetroStation;
use App\Region;

class BuildingController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('building_access'), 403);

        $buildings = Building::all();

        return view('admin.buildings.index', compact('buildings'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('building_create'), 403);

        $regions = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $metro_stations = MetroStation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.buildings.create', compact('regions', 'metro_stations'));
    }

    public function store(StoreBuildingRequest $request)
    {
        abort_unless(\Gate::allows('building_create'), 403);

        $building = Building::create($request->all());

        return redirect()->route('admin.buildings.index');
    }

    public function edit(Building $building)
    {
        abort_unless(\Gate::allows('building_edit'), 403);

        $regions = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $metro_stations = MetroStation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $building->load('region', 'metro_station');

        return view('admin.buildings.edit', compact('regions', 'metro_stations', 'building'));
    }

    public function update(UpdateBuildingRequest $request, Building $building)
    {
        abort_unless(\Gate::allows('building_edit'), 403);

        $building->update($request->all());

        return redirect()->route('admin.buildings.index');
    }

    public function show(Building $building)
    {
        abort_unless(\Gate::allows('building_show'), 403);

        $building->load('region', 'metro_station');

        return view('admin.buildings.show', compact('building'));
    }

    public function destroy(Building $building)
    {
        abort_unless(\Gate::allows('building_delete'), 403);

        $building->delete();

        return back();
    }

    public function massDestroy(MassDestroyBuildingRequest $request)
    {
        Building::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
