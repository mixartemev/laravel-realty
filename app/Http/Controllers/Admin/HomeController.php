<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Объекты недвижимости',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\RealtyObject',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd.m.Y H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
        ];

        $chart1 = new LaravelChart($settings1);

        $settings2 = [
            'chart_title'           => 'Количество сотрудников',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\User',
            'group_by_field'        => 'email_verified_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd.m.Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
        ];

        $settings2['total_number'] = $settings2['model']::when(isset($settings2['filter_field']), function ($query) use ($settings2) {
            if (isset($settings2['filter_days'])) {
                return $query->where(
                    $settings2['filter_field'],
                    '>=',
                    now()->subDays($settings2['filter_days'])->format('Y-m-d')
                );
            } else if (isset($settings2['filter_period'])) {
                switch ($settings2['filter_period']) {
                    case 'week':
                        $start  = date('Y-m-d', strtotime('last Monday'));
                        break;
                    case 'month':
                        $start = date('Y-m') . '-01';
                        break;
                    case 'year':
                        $start  = date('Y') . '-01-01';
                        break;
                }

                if (isset($start)) {
                    return $query->where($settings2['filter_field'], '>=', $start);
                }
            }
        })
            ->{$settings2['aggregate_function'] ?? 'count'}($settings2['aggregate_field'] ?? '*');

        $settings3 = [
            'chart_title'           => 'Последние 10 объектов этого месяца',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\RealtyObject',
            'group_by_field'        => 'planned_contact',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'month',
            'group_by_field_format' => 'd.m.Y',
            'column_class'          => 'col-md-12',
            'entries_number'        => '10',
            'fields'                => [
                '0' => 'user',
                '1' => 'planned_contact',
                '2' => 'cadastral_numb',
                '3' => 'area',
                '4' => 'contract_status',
                '5' => 'commission',
                '6' => 'cost',
                '7' => 'created_at',
                '8' => 'floor',
            ],
        ];

        $settings3['data'] = $settings3['model']::latest()
            ->take($settings3['entries_number'])
            ->get();

        $settings4 = [
            'chart_title'        => 'Региональность',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_string',
            'model'              => 'App\\Region',
            'group_by_field'     => 'name',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'column_class'       => 'col-md-4',
            'entries_number'     => '5',
        ];

        $chart4 = new LaravelChart($settings4);

        $settings5 = [
            'chart_title'        => 'Метрошность',
            'chart_type'         => 'bar',
            'report_type'        => 'group_by_string',
            'model'              => 'App\\MetroStation',
            'group_by_field'     => 'name',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'column_class'       => 'col-md-4',
            'entries_number'     => '5',
        ];

        $chart5 = new LaravelChart($settings5);

        $settings6 = [
            'chart_title'           => 'Этажность',
            'chart_type'            => 'pie',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\Floor',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd.m.Y H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
        ];

        $chart6 = new LaravelChart($settings6);

        return view('home', compact('chart1', 'settings2', 'settings3', 'chart4', 'chart5', 'chart6'));
    }
}
