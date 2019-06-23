<?php

namespace App\Http\Requests;

use App\Floor;
use Illuminate\Foundation\Http\FormRequest;

class StoreFloorRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('floor_create');
    }

    public function rules()
    {
        return [
            'number'      => [
                'required',
            ],
            'ceiling'     => [
                'min:1',
                'max:100',
            ],
        ];
    }
}
