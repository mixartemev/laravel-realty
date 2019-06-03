<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetroStation extends Model
{
    public $table = 'metro_stations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'line',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const LINE_SELECT = [
        '1' => 'Сокольническая',
        '2' => 'Арбатско-покровская',
        '3' => 'Замоскворецкая',
    ];
}
