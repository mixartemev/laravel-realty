<?php

namespace App\Http\Requests;

use App\RealtyObject;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRealtyObjectRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('realty_object_edit');
    }

    public function rules()
    {
        return [
            'user_id'         => [
                'required',
                'integer',
            ],
            'planned_contact' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'building_id'     => [
                'required',
                'integer',
            ],
            'cadastral_numb'  => [
                'max:255',
            ],
            'area'            => [
                'required',
            ],
            'contract_status' => [
                'required',
            ],
            'commission'      => [
                'max:500',
            ],
        ];
    }
}
