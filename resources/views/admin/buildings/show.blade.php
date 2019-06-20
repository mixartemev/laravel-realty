@extends('layouts.admin')
@section('content')

    @include ('admin.buildings.show_inner', ['building' => $building])

@endsection
