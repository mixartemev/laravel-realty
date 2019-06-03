<?php

namespace App\Http\Requests;

use App\RealtyObject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyRealtyObjectRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('realty_object_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:realty_objects,id',
        ];
    }
}
