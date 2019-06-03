<?php

namespace App\Http\Controllers\Admin;

use App\Building;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRealtyObjectRequest;
use App\Http\Requests\StoreRealtyObjectRequest;
use App\Http\Requests\UpdateRealtyObjectRequest;
use App\RealtyObject;
use App\User;

class RealtyObjectController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('realty_object_access'), 403);

        $realtyObjects = RealtyObject::all();

        return view('admin.realtyObjects.index', compact('realtyObjects'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('realty_object_create'), 403);

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $buildings = Building::all()->pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.realtyObjects.create', compact('users', 'buildings'));
    }

    public function store(StoreRealtyObjectRequest $request)
    {
        abort_unless(\Gate::allows('realty_object_create'), 403);

        $realtyObject = RealtyObject::create($request->all());

        foreach ($request->input('photos', []) as $file) {
            $realtyObject->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
        }

        foreach ($request->input('docs', []) as $file) {
            $realtyObject->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('docs');
        }

        return redirect()->route('admin.realty-objects.index');
    }

    public function edit(RealtyObject $realtyObject)
    {
        abort_unless(\Gate::allows('realty_object_edit'), 403);

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $buildings = Building::all()->pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $realtyObject->load('user', 'building');

        return view('admin.realtyObjects.edit', compact('users', 'buildings', 'realtyObject'));
    }

    public function update(UpdateRealtyObjectRequest $request, RealtyObject $realtyObject)
    {
        abort_unless(\Gate::allows('realty_object_edit'), 403);

        $realtyObject->update($request->all());

        if (count($realtyObject->photos) > 0) {
            foreach ($realtyObject->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $realtyObject->photos->pluck('file_name')->toArray();

        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $realtyObject->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
            }
        }

        if (count($realtyObject->docs) > 0) {
            foreach ($realtyObject->docs as $media) {
                if (!in_array($media->file_name, $request->input('docs', []))) {
                    $media->delete();
                }
            }
        }

        $media = $realtyObject->docs->pluck('file_name')->toArray();

        foreach ($request->input('docs', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $realtyObject->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('docs');
            }
        }

        return redirect()->route('admin.realty-objects.index');
    }

    public function show(RealtyObject $realtyObject)
    {
        abort_unless(\Gate::allows('realty_object_show'), 403);

        $realtyObject->load('user', 'building');

        return view('admin.realtyObjects.show', compact('realtyObject'));
    }

    public function destroy(RealtyObject $realtyObject)
    {
        abort_unless(\Gate::allows('realty_object_delete'), 403);

        $realtyObject->delete();

        return back();
    }

    public function massDestroy(MassDestroyRealtyObjectRequest $request)
    {
        RealtyObject::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
