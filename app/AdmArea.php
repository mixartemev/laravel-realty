<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdmArea
 *
 * @property int $id
 * @property string $name
 * @property bool $is_moscow В Москве
 *
 * @property Collection|Region[] $regions
 *
 * @mixin Eloquent
 * @package App
 */
class AdmArea extends Model
{
	protected $table = 'adm_areas';

	public $timestamps = false;

	protected $casts = [
		'is_moscow' => 'bool'
	];

	protected $fillable = [
		'name',
		'is_moscow'
	];

	public function regions()
	{
		return $this->hasMany(Region::class);
	}
}
