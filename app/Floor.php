<?php

namespace App;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Floor
 *
 * @property int $id
 * @property int $number
 * @property string $name
 * @property int $area
 * @property float $ceiling
 * @property int $realty_object_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $deleted_at
 *
 * @mixin Eloquent
 * @package App
 */
class Floor extends Model
{
	use SoftDeletes;
	protected $table = 'floors';

	protected $casts = [
		'number' => 'int',
		'area' => 'int',
		'ceiling' => 'float',
		'realty_object_id' => 'int'
	];

	protected $fillable = [
		'number',
		'name',
		'area',
		'ceiling',
		'realty_object_id'
	];

	public function realty_object()
	{
		return $this->belongsTo(RealtyObject::class);
	}
}
