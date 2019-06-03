@extends('layouts.admin')
@section('content')

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
                    @foreach(App\Building::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $building->type) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <p class="help-block">
                        {{ $errors->first('type') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('profile') ? 'has-error' : '' }}">
                <label for="profile">{{ trans('cruds.building.fields.profile') }}*</label>
                <select id="profile" name="profile" class="form-control" required>
                    <option value="" disabled {{ old('profile', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Building::PROFILE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('profile', $building->profile) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('profile'))
                    <p class="help-block">
                        {{ $errors->first('profile') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection