<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name">{{ trans('cruds.region.fields.name') }}*</label>
    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($region) ? $region->name : '') }}" required>
    @if($errors->has('name'))
        <p class="help-block">
            {{ $errors->first('name') }}
        </p>
    @endif
    <p class="helper-block">
        {{ trans('cruds.region.fields.name_helper') }}
    </p>
</div>
{{--<div class="form-group {{ $errors->has('is_moscow') ? 'has-error' : '' }}">--}}
{{--    <label for="is_moscow">{{ trans('cruds.region.fields.is_moscow') }}</label>--}}
{{--    <input name="is_moscow" type="hidden" value="0">--}}
{{--    <input value="1" type="checkbox" id="is_moscow" name="is_moscow" {{ (isset($region) && $region->is_moscow) || old('is_moscow', 0) === 1 ? 'checked' : '' }}>--}}
{{--    @if($errors->has('is_moscow'))--}}
{{--        <p class="help-block">--}}
{{--            {{ $errors->first('is_moscow') }}--}}
{{--        </p>--}}
{{--    @endif--}}
{{--    <p class="helper-block">--}}
{{--        {{ trans('cruds.region.fields.is_moscow_helper') }}--}}
{{--    </p>--}}
{{--</div>--}}
<div class="form-group {{ $errors->has('adm_area.name') ? 'has-error' : '' }}">
    <label for="name">{{ trans('cruds.region.fields.adm_area') }}*</label>
    <select id="adm_area" name="adm_area_id" class="form-control" required>
        <option value="" disabled {{ old('adm_area_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
        @foreach($admAreas as $id => $admArea)
            <option value="{{ $id }}" {{ (isset($region) && $region->admArea ? $region->adm_area_id : old('adm_area_id')) == $id ? 'selected' : '' }}>
                {{ $admArea }}
            </option>
        @endforeach
    </select>
    @if($errors->has('adm_area.name'))
        <p class="help-block">
            {{ $errors->first('adm_area.name') }}
        </p>
    @endif
    <p class="helper-block">
        {{ trans('cruds.region.fields.adm_area_helper') }}
    </p>
</div>
<div>
    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
</div>
