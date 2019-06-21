<?php

namespace App;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Floor
 *
 * @property int $id
 * @property int $number Номер
 * @property int $type Тип
 * @property int $area Площадь на этаже
 * @property float $ceiling Высота потолков
 * @property int $realty_object_id Блок
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property RealtyObject $realty_object
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
        self::TYPE_GENERAL => 'этаж',
        self::TYPE_MEZZANINE => 'антресоль',
        self::TYPE_ATTIC => 'чердак',
        self::TYPE_BASEMENT => 'подвал',
        self::TYPE_MANSARD => 'мансарда',
        self::TYPE_ROOF => 'крыша',
        self::TYPE_GROUND_FLOOR => 'цоколь',
    ];

    protected $casts = [
        'number' => 'int',
        'type' => 'int',
        'area' => 'int',
        'ceiling' => 'float',
        'realty_object_id' => 'int'
    ];

    protected $fillable = [
        'number',
        'type',
        'area',
        'ceiling',
        'realty_object_id'
    ];

	public function realty_object()
	{
		return $this->belongsTo(RealtyObject::class);
	}
}
