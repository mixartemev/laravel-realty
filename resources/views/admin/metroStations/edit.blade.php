@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.metroStation.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.metro-stations.update", [$metroStation->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include ('metroStations.form', ['metroStation' => $metroStation])
        </form>
    </div>
</div>
@endsection