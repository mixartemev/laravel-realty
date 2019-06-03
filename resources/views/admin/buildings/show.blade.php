@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.building.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.building.fields.address') }}
                        </th>
                        <td>
                            {{ $building->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.building.fields.region') }}
                        </th>
                        <td>
                            {{ $building->region->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.building.fields.metro_station') }}
                        </th>
                        <td>
                            {{ $building->metro_station->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.building.fields.type') }}
                        </th>
                        <td>
                            {{ App\Building::TYPE_SELECT[$building->type] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.building.fields.profile') }}
                        </th>
                        <td>
                            {{ App\Building::PROFILE_SELECT[$building->profile] }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back
            </a>
        </div>
    </div>
</div>
@endsection