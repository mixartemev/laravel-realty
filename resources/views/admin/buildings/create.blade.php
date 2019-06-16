@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.building.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.buildings.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include ('admin.buildings.form', ['building' => (new \App\Building())])
        </form>
    </div>
</div>
@endsection