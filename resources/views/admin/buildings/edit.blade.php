@extends('layouts.admin')
@section('content')

<?php
use App\Building;
/** @var Building $building */
?>

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.building.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.buildings.update", [$building->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.building.fields.address') }}*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($building) ? $building->address : '') }}" required>
                @if($errors->has('address'))
                    <p class="help-block">
                        {{ $errors->first('address') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.building.fields.address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('region_id') ? 'has-error' : '' }}">
                <label for="region">{{ trans('cruds.building.fields.region') }}*</label>
                <select name="region_id" id="region" class="form-control select2" required>
                    @foreach($regions as $id => $region)
                        <option value="{{ $id }}" {{ (isset($building) && $building->region ? $building->region->id : old('region_id')) == $id ? 'selected' : '' }}>{{ $region }}</option>
                    @endforeach
                </select>
                @if($errors->has('region_id'))
                    <p class="help-block">
                        {{ $errors->first('region_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('metro_station_id') ? 'has-error' : '' }}">
                <label for="metro_station">{{ trans('cruds.building.fields.metro_station') }}</label>
                <select name="metro_station_id" id="metro_station" class="form-control select2">
                    @foreach($metro_stations as $id => $metro_station)
                        <option value="{{ $id }}" {{ (isset($building) && $building->metro_station ? $building->metro_station->id : old('metro_station_id')) == $id ? 'selected' : '' }}>{{ $metro_station }}</option>
                    @endforeach
                </select>
                @if($errors->has('metro_station_id'))
                    <p class="help-block">
                        {{ $errors->first('metro_station_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                <label for="type">{{ trans('cruds.building.fields.type') }}*</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="" disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Building::TYPES as $key => $label)
                        <option value="{{ $key }}" {{ (isset($building) && $building->type ? $building->type : old('type')) == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <p class="help-block">
                        {{ $errors->first('type') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('class') ? 'has-error' : '' }}">
                <label for="class">{{ trans('cruds.building.fields.class') }}*</label>
                <select id="class" name="class" class="form-control" required>
                    <option value="" disabled {{ old('class', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($building->getEnumValues('class') as $key => $label)
                        <option value="{{ $key }}" {{ old('class', $building->class) == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('class'))
                    <p class="help-block">
                        {{ $errors->first('class') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('release_date') ? 'has-error' : '' }}">
                <label for="release_date">{{ trans('cruds.building.fields.release_date') }}</label>
                <input type="text" id="release_date" name="release_date" class="form-control date" value="{{ old('release_date', isset($building) ? $building->release_date : '') }}">
                @if($errors->has('release_date'))
                    <p class="help-block">
                        {{ $errors->first('release_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.building.fields.release_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.building.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($building) ? $building->description : '') }}</textarea>
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.building.fields.description_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection