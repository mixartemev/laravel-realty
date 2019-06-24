<?php
use App\Floor;
/** @var Floor $floor */
?>
<div class="form-row">
    <input type="hidden" name="realty_object_id" value="{{ $floor->realty_object_id }}">
    <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }} col-sm-2">
        <label for="number">{{ trans('cruds.floor.fields.number') }}*</label>
        <input type="number" id="number" name="number" class="form-control" value="{{ old('number', $floor->number) }}" step="1" required>
        @if($errors->has('number'))
            <p class="help-block">
                {{ $errors->first('number') }}
            </p>
        @endif
        <p class="helper-block">
            {{ trans('cruds.floor.fields.number_helper') }}
        </p>
    </div>
    <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }} col-sm-3">
        <label for="type">{{ trans('cruds.floor.fields.type') }}*</label>
        <select name="type" id="type" class="form-control select2" required>
            @foreach($floor::TYPES as $id => $type)
                <option value="{{ $id }}" {{ ($floor->type ?: old('type')) == $id ? 'selected' : '' }}>{{ $type }}</option>
            @endforeach
        </select>
        @if($errors->has('type'))
            <p class="help-block">
                {{ $errors->first('type') }}
            </p>
        @endif
    </div>
    <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }} col-sm-3">
        <label for="area">{{ trans('cruds.floor.fields.area') }}</label>
        <input type="number" id="area" name="area" class="form-control" value="{{ old('area', $floor->area ?: '') }}" step="1">
        @if($errors->has('area'))
            <p class="help-block">
                {{ $errors->first('area') }}
            </p>
        @endif
        <p class="helper-block">
            {{ trans('cruds.floor.fields.area_helper') }}
        </p>
    </div>
    <div class="form-group {{ $errors->has('ceiling') ? 'has-error' : '' }} col-sm-3">
        <label for="ceiling">{{ trans('cruds.floor.fields.ceiling') }}</label>
        <input type="number" id="ceiling" name="ceiling" class="form-control" value="{{ old('ceiling', $floor->ceiling ?: '') }}" step="0.01" max="100">
        @if($errors->has('ceiling'))
            <p class="help-block">
                {{ $errors->first('ceiling') }}
            </p>
        @endif
        <p class="helper-block">
            {{ trans('cruds.floor.fields.ceiling_helper') }}
        </p>
    </div>
    <div class=" form-group col-sm-1">
        <label class="w-100">&nbsp;</label>
        @if ($floor->exists)
            <input class="btn btn-danger" type="submit" value="&ndash;">
        @else
            <input class="btn btn-success" type="submit" value="+">
        @endif
    </div>
</div>
