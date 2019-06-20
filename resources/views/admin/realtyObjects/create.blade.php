@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.realtyObject.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.realty-objects.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.realtyObjects.form')
        </form>
    </div>
</div>
@endsection

@include('admin.realtyObjects.form_scripts')
