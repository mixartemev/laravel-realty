@extends('layouts.admin')
@section('content')

<?php
use App\Building;
/** @var Building $building */
?>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.building.title_singular') }}: {{ $building->address }}
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
                            {{ $building->metro_station->name ? "{$building->metro_station->name} - {$building->metro_distance}  мин. ".App\Building::DISTANCE_TYPES[$building->metro_distance_type] : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.building.fields.type') }}
                        </th>
                        <td>
                            {{ App\Building::TYPES[$building->type] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.building.fields.class') }}
                        </th>
                        <td>
                            {{ $building->class }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.building.fields.floors') }}
                        </th>
                        <td>
                            {{ $building->floors }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.building.fields.release_date') }}
                        </th>
                        <td>
                            {{ $building->getFormattedReleaseDate() }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.building.fields.description') }}
                        </th>
                        <td>
                            {{ $building->description }}
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
