@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.metroStation.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.metro-stations.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include ('admin.metroStations.form', ['metroStation' => null])
        </form>
    </div>
</div>
@endsection