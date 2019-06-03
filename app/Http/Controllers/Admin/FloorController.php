<?php

namespace App\Http\Controllers\Admin;

use App\Building;
use App\Floor;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFloorRequest;
use App\Http\Requests\StoreFloorRequest;
use App\Http\Requests\UpdateFloorRequest;

class FloorController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('floor_access'), 403);

        $floors = Floor::all();

        return view('admin.floors.index', compact('floors'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('floor_create'), 403);

        $buildings = Building::all()->pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.floors.create', compact('buildings'));
    }

    public function store(StoreFloorRequest $request)
    {
        abort_unless(\Gate::allows('floor_create'), 403);

        $floor = Floor::create($request->all());

        return redirect()->route('admin.floors.index');
    }

    public function edit(Floor $floor)
    {
        abort_unless(\Gate::allows('floor_edit'), 403);

        $buildings = Building::all()->pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $floor->load('building');

        return view('admin.floors.edit', compact('buildings', 'floor'));
    }

    public function update(UpdateFloorRequest $request, Floor $floor)
    {
        abort_unless(\Gate::allows('floor_edit'), 403);

        $floor->update($request->all());

        return redirect()->route('admin.floors.index');
    }

    public function destroy(Floor $floor)
    {
        abort_unless(\Gate::allows('floor_delete'), 403);

        $floor->delete();

        return back();
    }

    public function massDestroy(MassDestroyFloorRequest $request)
    {
        Floor::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
