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
            'column_class'          => 'col-md-8',
            'entries_number'        => '5',
        ];
        $objectsCountLineChart = new LaravelChart($settings1);

        $settings6 = [
            'chart_title'           => 'Этажность',
            'chart_type'            => 'pie',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\\Floor',
            'group_by_field'        => 'number',
//            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
//            'filter_field'          => 'created_at',
//            'group_by_field_format' => 'd.m.Y H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
        ];

        $floorsPieChart = new LaravelChart($settings6);


//        $lastObjects = [
//            'chart_title'           => 'Последние 10 объектов этого месяца',
//            'chart_type'            => 'latest_entries',
//            'report_type'           => 'group_by_date',
//            'model'                 => 'App\\RealtyObject',
//            'group_by_field'        => 'planned_contact',
//            'group_by_period'       => 'day',
//            'aggregate_function'    => 'count',
//            'filter_field'          => 'created_at',
//            'filter_period'         => 'month',
//            'group_by_field_format' => 'd.m.Y',
//            'column_class'          => 'col-md-12',
//            'entries_number'        => '10',
//            'fields'                => [
//                '0' => 'user',
//                '1' => 'planned_contact',
//                '2' => 'cadastral_numb',
//                '3' => 'area',
//                '4' => 'contract_status',
//                '5' => 'commission',
//                '6' => 'cost',
//                '7' => 'created_at',
//                '8' => 'floor',
//            ],
//        ];
//        $lastObjects['data'] = $lastObjects['model']::latest()
//            ->take($lastObjects['entries_number'])
//            ->get();


        $settings4 = [
            'chart_title'        => 'Региональность',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_relationship',
            'model'              => 'App\\Building',
            'relationship_name'  => 'region',
            'group_by_field'     => 'name',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'column_class'       => 'col-md-4',
            'entries_number'     => '5',
        ];
        $regionsPieChart = new LaravelChart($settings4);

        $settings5 = [
            'chart_title'        => 'Метрошность',
            'chart_type'         => 'bar',
            'report_type'        => 'group_by_string',
            'model'              => 'App\\Building',
            'group_by_field'     => 'metro_station_id',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'column_class'       => 'col-md-4',
            'entries_number'     => '5',
        ];
        $metroBarChart = new LaravelChart($settings5);

        $usersCount = [
            'chart_title'           => 'Количество сотрудников',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\User',
            'group_by_field'        => 'email_verified_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd.m.Y H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
        ];

        $usersCount['total_number'] = $usersCount['model']::when(isset($usersCount['filter_field']), function ($query) use ($usersCount) {
            if (isset($usersCount['filter_days'])) {
                return $query->where(
                    $usersCount['filter_field'],
                    '>=',
                    now()->subDays($usersCount['filter_days'])->format('Y-m-d')
                );
            } else if (isset($usersCount['filter_period'])) {
                switch ($usersCount['filter_period']) {
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
                    return $query->where($usersCount['filter_field'], '>=', $start);
                }
            }
        })
            ->{$usersCount['aggregate_function'] ?? 'count'}($usersCount['aggregate_field'] ?? '*');

        return view('home', compact('objectsCountLineChart', 'usersCount', /*'lastObjects', */'regionsPieChart', 'metroBarChart', 'floorsPieChart'));
    }
}
