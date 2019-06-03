<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class RealtyObject extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

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
