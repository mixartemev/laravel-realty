<?php

namespace App\Http\Requests;

use App\Building;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBuildingRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('building_edit');
    }

    public function rules()
    {
        return [
            'address'   => [
                'required',
                'min:3',
                'max:255',
            ],
            'region_id' => [
                'required',
                'integer',
            ],
            'type'      => [
                'required',
            ],
            'profile'   => [
                'required',
            ],
        ];
    }
}
