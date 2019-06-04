@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.region.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.regions.update", [$region->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include ('admin.regions.form', ['region' => null])
        </form>
    </div>
</div>
@endsection