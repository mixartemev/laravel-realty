@extends('layouts.admin')
@section('content')
<?php
use App\RealtyObject;
use Spatie\MediaLibrary\Models\Media;
/** @var RealtyObject $realtyObject */
$contact = $realtyObject->contact;
?>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.realtyObject.title_singular') }}: {{ $realtyObject->id }}
    </div>

    <div class="card-body row">
        <div class="col-sm-5">
            <div id="gallery" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <?php foreach ($realtyObject->photos as $k => $photo) { ?>
                    <li data-target="#gallery" data-slide-to="<?= $k ?>" <?= $k ? '' : 'class="active"' ?>></li>
                <?php } ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($realtyObject->photos as $k => $photo) {
                    /** @var Media $photo */
                    ?>
                        <div class="carousel-item <?= $k ? '' : 'active' ?>">
                            <img class="d-block w-100" src="<?= $photo->url ?>" alt="<?= $photo->name ?>">
                        </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#gallery" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#gallery" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <br>

            @if($floors = $realtyObject->floors)
                <div class="card">
                    <div class="card-header">
                        {{ trans('cruds.floor.title') }}
                    </div>

                    <div class="card-body">
                        @foreach ($floors as $floor)
                            <div class="card">
                                <div class="card-header">
                                    {{ trans('cruds.floor.title_singular') }} #{{ $floor->number }}
                                </div>

                                <div class="card-body">
                                    <h5></h5>
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.floor.fields.type') }}
                                            </th>
                                            <td>
                                                {{ \App\Floor::TYPES[$floor->type] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.floor.fields.area') }}
                                            </th>
                                            <td>
                                                {{ number_format($floor->area, 0, '.', ' ') }} м<sup>2</sup>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.floor.fields.ceiling') }} м
                                            </th>
                                            <td>
                                                {{ $floor->ceiling }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <img class="w-100" src="/img/map.png">
        </div>

        <div class="col-sm-7">
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
                            {{ trans('cruds.realtyObject.fields.type') }}
                        </th>
                        <td>
                            {{ \App\RealtyObject::TYPES[$realtyObject->type] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.profile') }}
                        </th>
                        <td>
                            {{ \App\RealtyObject::PROFILES[$realtyObject->profile] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.contact') }}
                        </th>
                        <td>
                            {{ $contact->name }} - {{ $contact->position }}
                            из
                            {{ $contact->brand_name }}
                            <br>
                            <?= $contact->web ? '<a href="'.$contact->web.'" target="_blank">'.$contact->web.'</a>, ' : '' ?>
                            <?= $contact->email ? '<a href="mailto:'.$contact->email.'">'.$contact->email.'</a>, ' : '' ?>
                            <?= $contact->phone ? '<a href="tel:'.preg_replace("/[^+\d]/", '', $contact->phone).'">'.$contact->phone.'</a>, ' : '' ?>
                            <?= $contact->additional_contact ?>
                            <?= $contact->description ? '<br>'.$contact->description : '' ?>
                        </td>
                    </tr>
                    <?= $contact->requisites ? '<tr><th>'
                        .trans('cruds.realtyObject.fields.contact_requisites').
                    '</th><td>'
                        .$contact->requisites.
                    '</td></tr>' : '' ?>
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
                            {{ trans('cruds.realtyObject.fields.power') }}
                        </th>
                        <td>
                            {{ $realtyObject->power }}
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
                            <?= number_format($realtyObject->cost, 0, '.', ' ').' '.RealtyObject::CURS[$realtyObject->currency] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.cost_m') }}
                        </th>
                        <td>
                            {{ $realtyObject->getCostM().' '.RealtyObject::CURS[$realtyObject->currency] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.docs') }}
                        </th>
                        <td>
                            @foreach ($realtyObject->docs as $doc)
                                <a href="/storage/<?= $doc->id ?>/<?= $doc->file_name ?>" target="_blank"><?= $doc->file_name ?></a>
                                <?= $loop->last ? '' : ',<br>' ?>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtyObject.fields.building') }}
                        </th>
                        <td>
                            <a href="<?= route('admin.buildings.show', $realtyObject->building_id) ?>"><?= $realtyObject->building->address ?></a>
                        </td>
                    </tr>
                </tbody>
            </table>



            @include ('admin.buildings.show_inner', ['building' => $realtyObject->building])

            @if (Route::is('admin.realty-objects.show'))
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
