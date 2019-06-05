<?php

namespace App\Http\Controllers\Admin;

use App\Building;
use App\Floor;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFloorRequest;
use App\Http\Requests\StoreFloorRequest;
use App\Http\Requests\UpdateFloorRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FloorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Floor::query();
            $query->with(['building']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'floor_show';
                $editGate      = 'floor_edit';
                $deleteGate    = 'floor_delete';
                $crudRoutePart = 'floors';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : "";
            });
            $table->editColumn('area', function ($row) {
                return $row->area ? $row->area : "";
            });
            $table->editColumn('ceiling', function ($row) {
                return $row->ceiling ? $row->ceiling : "";
            });
            $table->editColumn('building.building', function ($row) {
                return $row->building_id ? $row->building->address : '';
            });
            $table->rawColumns(['actions', 'placeholder', 'building']);

            return $table->make(true);
        }

        return view('admin.floors.index');
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
