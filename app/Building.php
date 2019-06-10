<?php

namespace App;

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
 * @property int $type Тип дома
 * @property int $profile Профиль помещения
 * @property int $area Общая площадь
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $deleted_at
 *
 * @property MetroStation $metro_station
 * @property Region $region
 * @property Collection|Floor[] $floors
 * @mixin Eloquent
 * @package App\Models
 */
class Building extends Model
{
	use SoftDeletes;
	protected $table = 'buildings';

	protected $casts = [
		'region_id' => 'int',
		'metro_station_id' => 'int',
		'metro_distance' => 'int',
		'type' => 'int',
		'profile' => 'int',
		'area' => 'int'
	];

	protected $fillable = [
		'address',
		'region_id',
		'metro_station_id',
		'metro_distance',
		'type',
		'profile',
		'area'
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

	public function metro_station()
	{
		return $this->belongsTo(MetroStation::class);
	}

	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	public function floors()
	{
		return $this->hasMany(Floor::class);
	}
}
