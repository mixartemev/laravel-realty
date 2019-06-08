<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * App\RealtyObject
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $planned_contact
 * @property string|null $cadastral_numb
 * @property float $area
 * @property int|null $power
 * @property float|null $ceiling
 * @property string $contract_status
 * @property float|null $commission
 * @property string|null $description
 * @property float|null $cost
 * @property float|null $cost_m
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $user_id
 * @property int $floor_id
 * @property-read \App\Floor $floor
 * @property-read mixed $docs
 * @property-read mixed $photos
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\RealtyObject onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereCadastralNumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereCeiling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereContractStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereCostM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereFloorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject wherePlannedContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtyObject whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RealtyObject withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\RealtyObject withoutTrashed()
 * @mixin \Eloquent
 */
class RealtyObject extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, Auditable;

    public $table = 'realty_objects';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'planned_contact',
    ];

    const CONTRACT_STATUS_SELECT = [
        '1' => 'Подпишут под клиент',
        '2' => 'Подписан',
    ];

    protected $fillable = [
        'area',
        'cost',
        'power',
        'cost_m',
        'user_id',
        'ceiling',
        'floor_id',
        'commission',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'cadastral_numb',
        'planned_contact',
        'contract_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getPlannedContactAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPlannedContactAttribute($value)
    {
        $this->attributes['planned_contact'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getphotosAttribute()
    {
        $files = $this->getMedia('photos');

        $files->each(function ($item) {
            $item->url = $item->getUrl();
        });

        return $files;
    }

    public function getdocsAttribute()
    {
        return $this->getMedia('docs');
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }
}
