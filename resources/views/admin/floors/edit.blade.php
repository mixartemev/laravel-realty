@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.floor.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.floors.update", [$floor->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.floors.form', ['floor' => $floor])
        </form>
    </div>
</div>
@endsection
