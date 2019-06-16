<?php

namespace App;

use App\Http\Traits\ModelExtension;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Building
 *
 * @property int $id Здания
 * @property string $address Адрес
 * @property int $region_id Округ / Район подмосковья
 * @property int $metro_station_id Метро
 * @property int $metro_distance Удаленность до метро
 * @property int $metro_distance_type Пешком/транспортом
 * @property int $type Тип
 * @property string $class Класс
 * @property Carbon $release_date Ввод в эксплуатацию
 * @property int $area Общая площадь
 * @property int $floors Этажность
 * @property string $description Описание
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $deleted_at
 *
 * @property MetroStation $metro_station
 * @property Region $region
 * @property Collection|RealtyObject[] $realty_objects
 *
 * @mixin Eloquent
 * @package App
 */
class Building extends Model
{
    use SoftDeletes;
    use ModelExtension;

    protected $table = 'buildings';

    protected $casts = [
        'region_id' => 'int',
        'metro_station_id' => 'int',
        'metro_distance' => 'int',
        'metro_distance_type' => 'int',
        'type' => 'int',
        'area' => 'int',
        'floors' => 'int'
    ];

    protected $dates = [
        'release_date'
    ];

    protected $fillable = [
        'address',
        'region_id',
        'metro_station_id',
        'metro_distance',
        'metro_distance_type',
        'type',
        'class',
        'release_date',
        'area',
        'floors',
        'description'
    ];

    const TYPE_LIVING = 1;
    const TYPE_MALL = 2;
    const TYPE_BUSINESS = 3;
    const TYPE_MFC = 4;
    const TYPE_ADMIN = 5;
    const TYPE_STOCK = 6;
    const TYPES = [
        self::TYPE_LIVING => 'жилое здание',
        self::TYPE_MALL => 'ТЦ',
        self::TYPE_BUSINESS => 'БЦ',
        self::TYPE_MFC => 'МФЦ',
        self::TYPE_ADMIN => 'Административное здание',
        self::TYPE_STOCK => 'Склад',
    ];

    const DISTANCE_TYPE_FOOT = 1;
    const DISTANCE_TYPE_TRANSPORT = 2;
    const DISTANCE_TYPES = [
        self::DISTANCE_TYPE_FOOT => 'пешком',
        self::DISTANCE_TYPE_TRANSPORT => 'на транспорте',
    ];

    const ROMAN_QUARTER = [
        1 => 'I',
        2 => 'II',
        3 => 'III',
        4 => 'IV',
    ];

    public function rusReleaseDate()
    {
        return $this->release_date ? \Illuminate\Support\Carbon::parse($this->release_date)->format(config('panel.date_format')) : null;
    }

    public function setReleaseDateAttribute($value)
    {
        $this->attributes['release_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFormattedReleaseDate()
    {
        return $this->release_date->year.' '.self::ROMAN_QUARTER[$this->release_date->quarter];
    }

    public function metro_station()
    {
        return $this->belongsTo(MetroStation::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function realty_objects()
    {
        return $this->hasMany(RealtyObject::class);
    }
}
