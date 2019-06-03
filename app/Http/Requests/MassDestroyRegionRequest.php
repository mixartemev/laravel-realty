<?php

namespace App\Http\Requests;

use App\Region;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyRegionRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('region_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:regions,id',
        ];
    }
}
