<?php

namespace App\Http\Controllers\Admin;

use App\Building;
use App\Contact;
use App\Floor;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRealtyObjectRequest;
use App\Http\Requests\StoreRealtyObjectRequest;
use App\Http\Requests\UpdateRealtyObjectRequest;
use App\RealtyObject;
use App\User;
use Exception;
use Gate;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class RealtyObjectController extends Controller
{
    use MediaUploadingTrait;

    /**
     * @param Request $request
     * @return Factory|View
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = RealtyObject::query();
            $query->with(['user', 'contact', 'building']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'realty_object_show';
                $editGate      = 'realty_object_edit';
                $deleteGate    = 'realty_object_delete';
                $crudRoutePart = 'realty-objects';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('user.user', function ($row) {
                return $row->user_id ? $row->user->name : '';
            });
            $table->editColumn('contact.contact', function ($row) {
                return $row->contact_id ? $row->contact->name : '';
            });
            $table->editColumn('building.building', function ($row) {
                return $row->building_id ? $row->building->address : '';
            });

            $table->editColumn('type', function ($row) {
                return RealtyObject::TYPES[$row->type];
            });
            $table->editColumn('profile', function ($row) {
                return RealtyObject::PROFILES[$row->profile];
            });
            $table->editColumn('cost', function ($row) {
                return number_format($row->cost, 0, '.', ' ').' '.RealtyObject::CURS[$row->currency];
            });
//            $table->editColumn('cost_m', function ($row) {
//                return $row->cost_m ? $row->cost_m : "";
//            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'contact', 'building']);

            return $table->make(true);
        }

        return view('admin.realtyObjects.index');
    }

    public function create()
    {
        abort_unless(Gate::allows('realty_object_create'), 403);

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $floors = Floor::all()->pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.realtyObjects.create', compact('users', 'floors'));
    }

    public function store(StoreRealtyObjectRequest $request)
    {
        abort_unless(Gate::allows('realty_object_create'), 403);

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
        abort_unless(Gate::allows('realty_object_edit'), 403);

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $contacts = Contact::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $buildings = Building::all()->pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');
        //$floors = Floor::all()->pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $realtyObject->load('user');

        return view('admin.realtyObjects.edit', compact('users', 'contacts', 'buildings', 'realtyObject'));
    }

    public function update(UpdateRealtyObjectRequest $request, RealtyObject $realtyObject)
    {
        abort_unless(Gate::allows('realty_object_edit'), 403);

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

        return redirect()->back();
    }

    public function show(RealtyObject $realtyObject)
    {
        abort_unless(Gate::allows('realty_object_show'), 403);

        $realtyObject->load('user');

        return view('admin.realtyObjects.show', compact('realtyObject'));
    }

    public function destroy(RealtyObject $realtyObject)
    {
        abort_unless(Gate::allows('realty_object_delete'), 403);

        $realtyObject->delete();

        return back();
    }

    public function massDestroy(MassDestroyRealtyObjectRequest $request)
    {
        RealtyObject::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
