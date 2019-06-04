@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.region.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.regions.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include ('admin.regions.form', ['region' => null])
        </form>
    </div>
</div>
@endsection