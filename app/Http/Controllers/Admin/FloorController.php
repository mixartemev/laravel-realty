<?php

namespace App\Http\Controllers\Admin;

use App\Floor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFloorRequest;
use App\Http\Requests\UpdateFloorRequest;
use Exception;
use Gate;
use Illuminate\Http\RedirectResponse;

class FloorController extends Controller
{
    public function store(StoreFloorRequest $request)
    {
        abort_unless(Gate::allows('floor_create'), 403);

        Floor::create($request->all());

        return redirect()->back();
    }

    public function update(UpdateFloorRequest $request, Floor $floor)
    {
        abort_unless(Gate::allows('floor_edit'), 403);

        $floor->update($request->all());

        return redirect()->back();
    }

    /**
     * @param Floor $floor
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Floor $floor)
    {
        abort_unless(Gate::allows('floor_delete'), 403);

        $floor->delete();

        return back();
    }
}
