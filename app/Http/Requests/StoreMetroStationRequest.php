<?php

namespace App\Http\Requests;

use App\MetroStation;
use Illuminate\Foundation\Http\FormRequest;

class StoreMetroStationRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('metro_station_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:255',
            ],
            'line' => [
                'required',
            ],
        ];
    }
}
