<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreFloorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('floor_create');
    }

    public function rules()
    {
        return [
            'number' => ['required', 'min:-9', 'max:127'],
            'type' => ['required', 'min:1', 'max:9'],
            'realty_object_id' => ['required'],
            'ceiling' => ['min:1', 'max:18'],
        ];
    }
}
