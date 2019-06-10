<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 *
 * @property int $id
 * @property string $name
 * @property int $adm_area_id
 *
 * @property AdmArea $admArea
 * @property Collection|Building[] $buildings
 * @property Collection|MetroStation[] $metroStations
 *
 * @mixin Eloquent
 * @package App
 */
class Region extends Model
{
	protected $table = 'regions';

	public $timestamps = false;

	protected $casts = [
		'adm_area_id' => 'int'
	];

	protected $fillable = [
		'name',
		'adm_area_id'
	];

	public function admArea()
	{
		return $this->belongsTo(AdmArea::class);
	}

	public function buildings()
	{
		return $this->hasMany(Building::class);
	}

	public function metroStations()
	{
		return $this->hasMany(MetroStation::class);
	}
}
