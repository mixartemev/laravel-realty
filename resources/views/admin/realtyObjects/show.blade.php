@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.realtyObject.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.user') }}
                        </th>
                        <td>
                            {{ $realtyObject->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.planned_contact') }}
                        </th>
                        <td>
                            {{ $realtyObject->planned_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.cadastral_numb') }}
                        </th>
                        <td>
                            {{ $realtyObject->cadastral_numb }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.area') }}
                        </th>
                        <td>
                            {{ $realtyObject->area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.power') }}
                        </th>
                        <td>
                            {{ $realtyObject->power }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.ceiling') }}
                        </th>
                        <td>
                            {{ $realtyObject->ceiling }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.contract_status') }}
                        </th>
                        <td>
                            {{ App\RealtyObject::CONTRACT_STATUS_SELECT[$realtyObject->contract_status] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.commission') }}
                        </th>
                        <td>
                            {{ $realtyObject->commission }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.description') }}
                        </th>
                        <td>
                            {!! $realtyObject->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.cost') }}
                        </th>
                        <td>
                            ${{ $realtyObject->cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.cost_m') }}
                        </th>
                        <td>
                            ${{ $realtyObject->cost_m }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.photos') }}
                        </th>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.docs') }}
                        </th>
                        <td>
                            {{ $realtyObject->docs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.floor') }}
                        </th>
                        <td>
                            {{ $realtyObject->floor->number ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back
            </a>
        </div>
    </div>
</div>
@endsection