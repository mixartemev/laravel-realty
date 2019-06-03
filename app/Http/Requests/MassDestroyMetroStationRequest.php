<?php

namespace App\Http\Requests;

use App\MetroStation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyMetroStationRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('metro_station_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:metro_stations,id',
        ];
    }
}
