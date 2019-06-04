<div class="form-row">
    <div class="form-group {{ $errors->has('building_id') ? 'has-error' : '' }} col-sm-12">
        <label for="building">{{ trans('cruds.floor.fields.building') }}*</label>
        <select name="building_id" id="building" class="form-control select2" required>
            @foreach($buildings as $id => $building)
                <option value="{{ $id }}" {{ (isset($floor) && $floor->building ? $floor->building->id : old('building_id')) == $id ? 'selected' : '' }}>{{ $building }}</option>
            @endforeach
        </select>
        @if($errors->has('building_id'))
            <p class="help-block">
                {{ $errors->first('building_id') }}
            </p>
        @endif
    </div>
    <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }} col-sm-4">
        <label for="number">{{ trans('cruds.floor.fields.number') }}*</label>
        <input type="number" id="number" name="number" class="form-control" value="{{ old('number', isset($floor) ? $floor->number : '') }}" step="1" required>
        @if($errors->has('number'))
            <p class="help-block">
                {{ $errors->first('number') }}
            </p>
        @endif
        <p class="helper-block">
            {{ trans('cruds.floor.fields.number_helper') }}
        </p>
    </div>
    <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }} col-sm-4">
        <label for="area">{{ trans('cruds.floor.fields.area') }}</label>
        <input type="number" id="area" name="area" class="form-control" value="{{ old('area', isset($floor) ? $floor->area : '') }}" step="1">
        @if($errors->has('area'))
            <p class="help-block">
                {{ $errors->first('area') }}
            </p>
        @endif
        <p class="helper-block">
            {{ trans('cruds.floor.fields.area_helper') }}
        </p>
    </div>
    <div class="form-group {{ $errors->has('ceiling') ? 'has-error' : '' }} col-sm-4">
        <label for="ceiling">{{ trans('cruds.floor.fields.ceiling') }}</label>
        <input type="number" id="ceiling" name="ceiling" class="form-control" value="{{ old('ceiling', isset($floor) ? $floor->ceiling : '') }}" step="0.01" max="100">
        @if($errors->has('ceiling'))
            <p class="help-block">
                {{ $errors->first('ceiling') }}
            </p>
        @endif
        <p class="helper-block">
            {{ trans('cruds.floor.fields.ceiling_helper') }}
        </p>
    </div>
</div>

<div>
    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
</div>
