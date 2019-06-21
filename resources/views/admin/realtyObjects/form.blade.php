<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user">{{ trans('cruds.realtyObject.fields.user') }}*</label>
    <select name="user_id" id="user" class="form-control select2" required>
        @foreach($users as $id => $user)
            <option value="{{ $id }}" {{ (isset($realtyObject) && $realtyObject->user ? $realtyObject->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
        @endforeach
    </select>
    @if($errors->has('user_id'))
        <p class="help-block">
            {{ $errors->first('user_id') }}
        </p>
    @endif
</div>
<div class="form-group {{ $errors->has('planned_contact') ? 'has-error' : '' }}">
    <label for="planned_contact">{{ trans('cruds.realtyObject.fields.planned_contact') }}</label>
    <input type="text" id="planned_contact" name="planned_contact" class="form-control date" value="{{ old('planned_contact', isset($realtyObject) ? $realtyObject->planned_contact : '') }}">
    @if($errors->has('planned_contact'))
        <p class="help-block">
            {{ $errors->first('planned_contact') }}
        </p>
    @endif
    <p class="helper-block">
        {{ trans('cruds.realtyObject.fields.planned_contact_helper') }}
    </p>
</div>
<div class="form-group {{ $errors->has('cadastral_numb') ? 'has-error' : '' }}">
    <label for="cadastral_numb">{{ trans('cruds.realtyObject.fields.cadastral_numb') }}</label>
    <input type="text" id="cadastral_numb" name="cadastral_numb" class="form-control" value="{{ old('cadastral_numb', isset($realtyObject) ? $realtyObject->cadastral_numb : '') }}">
    @if($errors->has('cadastral_numb'))
        <p class="help-block">
            {{ $errors->first('cadastral_numb') }}
        </p>
    @endif
    <p class="helper-block">
        {{ trans('cruds.realtyObject.fields.cadastral_numb_helper') }}
    </p>
</div>
<div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
    <label for="area">{{ trans('cruds.realtyObject.fields.area') }}*</label>
    <input type="number" id="area" name="area" class="form-control" value="{{ old('area', isset($realtyObject) ? $realtyObject->area : '') }}" step="0.1" required>
    @if($errors->has('area'))
        <p class="help-block">
            {{ $errors->first('area') }}
        </p>
    @endif
    <p class="helper-block">
        {{ trans('cruds.realtyObject.fields.area_helper') }}
    </p>
</div>
<div class="form-group {{ $errors->has('power') ? 'has-error' : '' }}">
    <label for="power">{{ trans('cruds.realtyObject.fields.power') }}</label>
    <input type="number" id="power" name="power" class="form-control" value="{{ old('power', isset($realtyObject) ? $realtyObject->power : '') }}" step="1">
    @if($errors->has('power'))
        <p class="help-block">
            {{ $errors->first('power') }}
        </p>
    @endif
    <p class="helper-block">
        {{ trans('cruds.realtyObject.fields.power_helper') }}
    </p>
</div>
<div class="form-group {{ $errors->has('ceiling') ? 'has-error' : '' }}">
    <label for="ceiling">{{ trans('cruds.realtyObject.fields.ceiling') }}</label>
    <input type="number" id="ceiling" name="ceiling" class="form-control" value="{{ old('ceiling', isset($realtyObject) ? $realtyObject->ceiling : '') }}" step="0.01">
    @if($errors->has('ceiling'))
        <p class="help-block">
            {{ $errors->first('ceiling') }}
        </p>
    @endif
    <p class="helper-block">
        {{ trans('cruds.realtyObject.fields.ceiling_helper') }}
    </p>
</div>
<div class="form-group {{ $errors->has('contract_status') ? 'has-error' : '' }}">
    <label for="contract_status">{{ trans('cruds.realtyObject.fields.contract_status') }}*</label>
    <select id="contract_status" name="contract_status" class="form-control" required>
        <option value="" disabled {{ old('contract_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
        @foreach(App\RealtyObject::CONTRACT_STATUS_SELECT as $key => $label)
            <option value="{{ $key }}" {{ old('contract_status', $realtyObject->contract_status) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
    @if($errors->has('contract_status'))
        <p class="help-block">
            {{ $errors->first('contract_status') }}
        </p>
    @endif
</div>
<div class="form-group {{ $errors->has('commission') ? 'has-error' : '' }}">
    <label for="commission">{{ trans('cruds.realtyObject.fields.commission') }}</label>
    <input type="number" id="commission" name="commission" class="form-control" value="{{ old('commission', isset($realtyObject) ? $realtyObject->commission : '') }}" step="0.1" max="500">
    @if($errors->has('commission'))
        <p class="help-block">
            {{ $errors->first('commission') }}
        </p>
    @endif
    <p class="helper-block">
        {{ trans('cruds.realtyObject.fields.commission_helper') }}
    </p>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description">{{ trans('cruds.realtyObject.fields.description') }}</label>
    <textarea id="description" name="description" class="form-control ">{{ old('description', isset($realtyObject) ? $realtyObject->description : '') }}</textarea>
    @if($errors->has('description'))
        <p class="help-block">
            {{ $errors->first('description') }}
        </p>
    @endif
    <p class="helper-block">
        {{ trans('cruds.realtyObject.fields.description_helper') }}
    </p>
</div>
<div class="form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
    <label for="cost">{{ trans('cruds.realtyObject.fields.cost') }}</label>
    <input type="number" id="cost" name="cost" class="form-control" value="{{ old('cost', isset($realtyObject) ? $realtyObject->cost : '') }}" step="0.01">
    @if($errors->has('cost'))
        <p class="help-block">
            {{ $errors->first('cost') }}
        </p>
    @endif
    <p class="helper-block">
        {{ trans('cruds.realtyObject.fields.cost_helper') }}
    </p>
</div>
<div class="form-group {{ $errors->has('cost_m') ? 'has-error' : '' }}">
    <label for="cost_m">{{ trans('cruds.realtyObject.fields.cost_m') }}</label>
    <input type="number" id="cost_m" name="cost_m" class="form-control" value="{{ old('cost_m', isset($realtyObject) ? $realtyObject->cost_m : '') }}" step="0.01">
    @if($errors->has('cost_m'))
        <p class="help-block">
            {{ $errors->first('cost_m') }}
        </p>
    @endif
    <p class="helper-block">
        {{ trans('cruds.realtyObject.fields.cost_m_helper') }}
    </p>
</div>
<div class="form-group {{ $errors->has('photos') ? 'has-error' : '' }}">
    <label for="photos">{{ trans('cruds.realtyObject.fields.photos') }}</label>
    <div class="needsclick dropzone" id="photos-dropzone">

    </div>
    @if($errors->has('photos'))
        <p class="help-block">
            {{ $errors->first('photos') }}
        </p>
    @endif
    <p class="helper-block">
        {{ trans('cruds.realtyObject.fields.photos_helper') }}
    </p>
</div>
<div class="form-group {{ $errors->has('docs') ? 'has-error' : '' }}">
    <label for="docs">{{ trans('cruds.realtyObject.fields.docs') }}</label>
    <div class="needsclick dropzone" id="docs-dropzone">

    </div>
    @if($errors->has('docs'))
        <p class="help-block">
            {{ $errors->first('docs') }}
        </p>
    @endif
    <p class="helper-block">
        {{ trans('cruds.realtyObject.fields.docs_helper') }}
    </p>
</div>
<div class="form-group {{ $errors->has('floor_id') ? 'has-error' : '' }}">
    <label for="floor">{{ trans('cruds.realtyObject.fields.floor') }}*</label>
    <select name="floor_id" id="floor" class="form-control select2" required>
        @foreach($floors as $id => $floor)
            <option value="{{ $id }}" {{ (isset($realtyObject) && $realtyObject->floor ? $realtyObject->floor->id : old('floor_id')) == $id ? 'selected' : '' }}>{{ $floor }}</option>
        @endforeach
    </select>
    @if($errors->has('floor_id'))
        <p class="help-block">
            {{ $errors->first('floor_id') }}
        </p>
    @endif
</div>
<div>
    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
</div>