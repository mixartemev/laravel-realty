<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MetroStation
 *
 * @property int $id
 * @property string $name
 * @property string $line
 * @property int $region_id
 *
 * @property Region $region
 * @property Collection|Building[] $buildings
 *
 * @mixin Eloquent
 * @package App\Models
 */
class MetroStation extends Model
{
	protected $table = 'metro_stations';

	public $timestamps = false;

	protected $casts = [
		'region_id' => 'int'
	];

	protected $fillable = [
		'name',
		'line',
		'region_id'
	];

	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	public function buildings()
	{
		return $this->hasMany(Building::class);
	}
}
