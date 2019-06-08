<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdmArea
 *
 * @package App
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property int $is_moscow
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdmArea newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdmArea newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdmArea query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdmArea whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdmArea whereIsMoscow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdmArea whereName($value)
 */
class AdmArea extends Model
{
    public $table = 'adm_areas';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'is_moscow',
    ];
}
