@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="{{ $objectsCountLineChart->options['column_class'] }}">
                    <h3>{!! $objectsCountLineChart->options['chart_title'] !!}</h3>
                    {!! $objectsCountLineChart->renderHtml() !!}
                </div>
                <div class="{{ $floorsPieChart->options['column_class'] }}">
                    <h3>{!! $floorsPieChart->options['chart_title'] !!}</h3>
                    {!! $floorsPieChart->renderHtml() !!}
                </div>

                {{-- Widget - latest entries --}}
{{--                <div class="{{ $lastObjects['column_class'] }}">--}}
{{--                    <h3>{{ $lastObjects['chart_title'] }}</h3>--}}
{{--                    <table class="table table-bordered table-striped">--}}
{{--                        <thead>--}}
{{--                            <tr>--}}
{{--                                @foreach($lastObjects['fields'] as $field)--}}
{{--                                    <th>--}}
{{--                                        {{ ucfirst($field) }}--}}
{{--                                    </th>--}}
{{--                                @endforeach--}}
{{--                            </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                            @forelse($lastObjects['data'] as $row)--}}
{{--                                <tr>--}}
{{--                                    @foreach($lastObjects['fields'] as $field)--}}
{{--                                        <td>--}}
{{--                                            {{ $row->{$field} }}--}}
{{--                                        </td>--}}
{{--                                    @endforeach--}}
{{--                                </tr>--}}
{{--                                @empty--}}
{{--                                <tr>--}}
{{--                                    <td colspan="{{ count($lastObjects['fields']) }}">{{ __('No entries found') }}</td>--}}
{{--                                </tr>--}}
{{--                            @endforelse--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
                {{-- !Widget - latest entries --}}

                <div class="{{ $regionsPieChart->options['column_class'] }}">
                    <h3>{!! $regionsPieChart->options['chart_title'] !!}</h3>
                    {!! $regionsPieChart->renderHtml() !!}
                </div>

                <div class="{{ $metroBarChart->options['column_class'] }}">
                    <h3>{!! $metroBarChart->options['chart_title'] !!}</h3>
                    {!! $metroBarChart->renderHtml() !!}
                </div>

                <div class="{{ $usersCount['column_class'] }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-red" style="display:flex; flex-direction: column; justify-content: center;">
                            <i class="fa fa-chart-line"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $usersCount['chart_title'] }}</span>
                            <span class="info-box-number">{{ number_format($usersCount['total_number']) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $objectsCountLineChart->renderJs() !!}{!! $floorsPieChart->renderJs() !!}{!! $regionsPieChart->renderJs() !!}{!! $metroBarChart->renderJs() !!}
@endsection