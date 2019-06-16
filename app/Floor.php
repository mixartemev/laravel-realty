<?php

namespace App;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

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
	protected $table = 'floors';

	public $timestamps = false;

    const TYPE_GENERAL = 1;
    const TYPE_MEZZANINE = 2;
    const TYPE_ATTIC = 3;
    const TYPE_BASEMENT = 4;
    const TYPE_MANSARD = 5;
    const TYPE_ROOF = 6;
    const TYPE_GROUND_FLOOR = 7;
    const TYPES = [
        'этаж',
        'антресоль',
        'чердак',
        'подвал',
        'мансарда',
        'крыша',
        'цоколь',
    ];

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
