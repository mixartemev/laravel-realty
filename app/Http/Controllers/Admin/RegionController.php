<?php

namespace App\Http\Controllers\Admin;

use App\AdmArea;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRegionRequest;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Region;
use Exception;
use Gate;
use Illuminate\Http\RedirectResponse;

class RegionController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('region_access'), 403);

        $regions = Region::all();

        return view('admin.regions.index', compact('regions'));
    }

    public function create()
    {
        abort_unless(Gate::allows('region_create'), 403);

        return view('admin.regions.create');
    }

    public function store(StoreRegionRequest $request)
    {
        abort_unless(Gate::allows('region_create'), 403);

        Region::create($request->all());

        return redirect()->route('admin.regions.index');
    }

    public function edit(Region $region)
    {
        abort_unless(Gate::allows('region_edit'), 403);
        $admAreas = AdmArea::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.regions.edit', compact('region', 'admAreas'));
    }

    public function update(UpdateRegionRequest $request, Region $region)
    {
        abort_unless(Gate::allows('region_edit'), 403);

        $region->update($request->all());

        return redirect()->route('admin.regions.index');
    }

    /**
     * @param Region $region
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Region $region)
    {
        abort_unless(Gate::allows('region_delete'), 403);
        $region->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegionRequest $request)
    {
        $request->get('ids');
        Region::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
