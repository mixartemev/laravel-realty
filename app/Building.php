<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'buildings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'type',
        'address',
        'profile',
        'region_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'metro_station_id',
    ];

    const PROFILE_SELECT = [
        '1' => 'Встроенное',
        '2' => 'Встроенно-пристроенное',
        '3' => 'ОСЗ целиком',
    ];

    const TYPE_SELECT = [
        '1' => 'Жилое',
        '2' => 'Административное',
        '3' => 'ОСЗ целиком',
        '4' => 'Реконструкция',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function metro_station()
    {
        return $this->belongsTo(MetroStation::class, 'metro_station_id');
    }
}
