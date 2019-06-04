<?php

namespace App\Http\Requests;

use App\Region;
use Illuminate\Foundation\Http\FormRequest;

class StoreRegionRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('region_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:2',
                'max:255',
            ],
        ];
    }
}
