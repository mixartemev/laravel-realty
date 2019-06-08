<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 *
 * @package App
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property int|null $adm_area_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereAdmAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereName($value)
 */
class Region extends Model
{
    public $table = 'regions';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'adm_area_id',
    ];
}
