@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.metroStation.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.metro-stations.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.metroStation.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($metroStation) ? $metroStation->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.metroStation.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('line') ? 'has-error' : '' }}">
                <label for="line">{{ trans('cruds.metroStation.fields.line') }}*</label>
                <select id="line" name="line" class="form-control" required>
                    <option value="" disabled {{ old('line', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\MetroStation::LINE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('line', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('line'))
                    <p class="help-block">
                        {{ $errors->first('line') }}
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