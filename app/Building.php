<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Building
 *
 * @property int $id
 * @property string $address
 * @property string $type
 * @property string $profile
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $metro_station_id
 * @property int $region_id
 * @property-read \App\MetroStation|null $metro_station
 * @property-read \App\Region $region
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Building onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereMetroStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Building withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Building withoutTrashed()
 * @mixin \Eloquent
 */
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
