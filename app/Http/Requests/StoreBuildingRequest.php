<?php

namespace App\Http\Requests;

use App\Building;
use Illuminate\Foundation\Http\FormRequest;

class StoreBuildingRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('building_create');
    }

    public function rules() //todo move rules out to common
    {
        return [
            'address' => [
                'required',
                'min:3',
                'max:255',
            ],
            'region_id' => [
                'required',
                'integer',
            ],
            'type' => [
                'required',
            ],
            'floors' => [
                'integer',
            ],
            'class'   => [
                'string',
                'max:1',
            ],
            'release_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
