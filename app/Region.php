<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $table = 'regions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'is_moscow',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
