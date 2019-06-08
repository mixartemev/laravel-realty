<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MetroStation
 *
 * @property int $id
 * @property string $name
 * @property string $line
 * @property int $region_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MetroStation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MetroStation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MetroStation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MetroStation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MetroStation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MetroStation whereLine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MetroStation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MetroStation whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MetroStation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MetroStation extends Model
{
    public $table = 'metro_stations';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'line',
        'region_id',
    ];
}
