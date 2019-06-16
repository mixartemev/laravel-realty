@extends('layouts.admin')
@section('content')

<?php
use App\Building;
/** @var Building $building */
?>

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.building.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.buildings.update", [$building->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include ('admin.buildings.form', ['building' => $building])
        </form>
    </div>
</div>
@endsection