@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.realtyObject.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.realty-objects.update", [$realtyObject->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.realtyObjects.form', ['realtyObject' => $realtyObject])
        </form>
        <br>
        @include('admin.floors.common', ['realtyObject' => $realtyObject])
    </div>
</div>
@endsection

@include('admin.realtyObjects.form_scripts', ['realtyObject' => $realtyObject])
