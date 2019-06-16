<?php

namespace App\Http\Controllers\Admin;

use App\Building;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBuildingRequest;
use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use App\MetroStation;
use App\Region;
use DataTables;
use Exception;
use Gate;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\View\View;
use Yajra\DataTables\EloquentDataTable;

class BuildingController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|JsonResponse|View
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Building::query();
            $query->with(['region', 'metro_station']);
            /** @var EloquentDataTable $table */
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'building_show';
                $editGate      = 'building_edit';
                $deleteGate    = 'building_delete';
                $crudRoutePart = 'buildings';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
//            $table->editColumn('address', function ($row) {
//                /** @var Building $row */
//                return $row->address ? '<a href="'.route('admin.buildings.show', $row->id).'">'.$row->address.'</a>' : "";
//            });
            $table->editColumn('region.region', function ($row) {
                return $row->region_id ? $row->region->name : '';
            });
            $table->editColumn('region.is_moscow', function ($row) {
                return $row->region_id ? $row->region->is_moscow : '';
            });
            $table->editColumn('metroStation.metro_station', function ($row) {
                return $row->metro_station_id ? $row->metro_station->name : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? Building::TYPES[$row->type] : '';
            });
            $now = Date::now();
            $table->editColumn('release_date', function ($row) use ($now) {
                /** @var Building $row */
                return $row->release_date ? ($row->release_date > $now ? $row->getFormattedReleaseDate() : trans('cruds.building.fields.release_date_past')) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'region', 'metro_station'/*, 'address'*/]);

            return $table->make(true);
        }

        return view('admin.buildings.index');
    }

    public function create()
    {
        abort_unless(Gate::allows('building_create'), 403);

        $regions = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $metro_stations = MetroStation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.buildings.create', compact('regions', 'metro_stations'));
    }

    public function store(StoreBuildingRequest $request)
    {
        abort_unless(Gate::allows('building_create'), 403);

        Building::create($request->all());

        return redirect()->route('admin.buildings.index');
    }

    public function edit(Building $building)
    {
        abort_unless(Gate::allows('building_edit'), 403);

        $regions = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $metro_stations = MetroStation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $building->load('region', 'metro_station');

        return view('admin.buildings.edit', compact('regions', 'metro_stations', 'building'));
    }

    public function update(UpdateBuildingRequest $request, Building $building)
    {
        abort_unless(Gate::allows('building_edit'), 403);

        $building->update($request->all());

        return redirect()->route('admin.buildings.index');
    }

    public function show(Building $building)
    {
        abort_unless(Gate::allows('building_show'), 403);

        $building->load('region', 'metro_station');

        return view('admin.buildings.show', ['building' => $building]);
    }

    /**
     * @param Building $building
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Building $building)
    {
        abort_unless(Gate::allows('building_delete'), 403);

        $building->delete();

        return back();
    }

    public function massDestroy(MassDestroyBuildingRequest $request)
    {
        Building::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
