@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.floor.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.floors.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.floors.form', ['floor' => null])
        </form>
    </div>
</div>
@endsection