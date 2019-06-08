<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Floor
 *
 * @property int $id
 * @property int $number
 * @property int|null $area
 * @property float|null $ceiling
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $building_id
 * @property-read \App\Building $building
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Floor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor whereBuildingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor whereCeiling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Floor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Floor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Floor withoutTrashed()
 * @mixin \Eloquent
 */
class Floor extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'floors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'area',
        'number',
        'ceiling',
        'created_at',
        'updated_at',
        'deleted_at',
        'building_id',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }
}
