<?php

namespace App;

use App\Traits\Auditable;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * Class RealtyObject
 *
 * @property int $id
 * @property int $type Тип площади
 * @property int $profile Классификация помещения
 * @property int $cost Стоимость
 * @property int $currency Валюта
 * @property int $user_id Брокер
 * @property int $contact_id Контакт
 * @property int $building_id Здание
 * @property Carbon $planned_contact Запланированная дата следующего контакта
 * @property string $cadastral_numb Кадастровый номер
 * @property int $power Электро мощность
 * @property int $contract_status Подписанность договора
 * @property string $description Описание
 * @property int $commission Комиссия
 * @property int $payback Окупаемость
 * @property int $bargain_limit Торг до

 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property Building $building
 * @property Contact $contact
 * @property User $user
 * @property Collection|Floor[] $floors
 * @property RentObject $rent_object
 * @property SaleObject $sale_object
 *
 * @property-read mixed $docs
 * @property-read mixed $photos
 * @property-read Collection|Media[] $media
 *
 * @method static bool|null forceDelete()
 * @method static Builder|RealtyObject newModelQuery()
 * @method static Builder|RealtyObject newQuery()
 * @method static Builder|RealtyObject onlyTrashed()
 * @method static Builder|RealtyObject query()
 * @method static bool|null restore()
 * @method static Builder|RealtyObject whereArea($value)
 * @method static Builder|RealtyObject whereCadastralNumb($value)
 * @method static Builder|RealtyObject whereCeiling($value)
 * @method static Builder|RealtyObject whereCommission($value)
 * @method static Builder|RealtyObject whereContractStatus($value)
 * @method static Builder|RealtyObject whereCost($value)
 * @method static Builder|RealtyObject whereCostM($value)
 * @method static Builder|RealtyObject whereCreatedAt($value)
 * @method static Builder|RealtyObject whereDeletedAt($value)
 * @method static Builder|RealtyObject whereDescription($value)
 * @method static Builder|RealtyObject whereFloorId($value)
 * @method static Builder|RealtyObject whereId($value)
 * @method static Builder|RealtyObject wherePlannedContact($value)
 * @method static Builder|RealtyObject wherePower($value)
 * @method static Builder|RealtyObject whereUpdatedAt($value)
 * @method static Builder|RealtyObject whereUserId($value)
 * @method static Builder|RealtyObject withTrashed()
 * @method static Builder|RealtyObject withoutTrashed()
 *
 * @mixin Eloquent
 * @package App
 */
class RealtyObject extends Model implements HasMedia
{
	use SoftDeletes, HasMediaTrait, Auditable;

	const TYPE_RETAIL = 1;
	const TYPE_OFFICE = 2;
	const TYPE_STOCK = 3;
	const TYPE_PSN = 4;
	const TYPE_FLAT = 5;
	const TYPE_APARTMENT = 6;
	const TYPE_VILLA = 7;
	const TYPES = [
	    self::TYPE_RETAIL => 'retail',
        self::TYPE_OFFICE => 'офис',
        self::TYPE_STOCK => 'склад',
        self::TYPE_PSN => 'ПСН',
        self::TYPE_FLAT => 'квартира',
        self::TYPE_APARTMENT => 'апартаменты',
        self::TYPE_VILLA => 'вилла',
    ];

    const PROFILE_INBUILT = 1;
    const PROFILE_INBUILT_ATTACHED = 2;
    const PROFILE_ATTACHED = 3;
    const PROFILE_SEPARATE = 4;
    const PROFILES = [
        self::PROFILE_INBUILT => 'встроенное',
        self::PROFILE_INBUILT_ATTACHED => 'встроенно-пристроенное',
        self::PROFILE_ATTACHED => 'пристроенное',
        self::PROFILE_SEPARATE => 'ОСЗ',
    ];

    const CONTRACT_STATUS_SELECT = [
        '1' => 'Подпишут под клиент',
        '2' => 'Подписан',
    ];

    const CUR_RUB = 1;
    const CUR_USD = 2;
    const CUR_EUR = 3;
    const CURS = [
        self::CUR_RUB => '₽',
        self::CUR_USD => '$',
        self::CUR_EUR => '€',
    ];

	protected $table = 'realty_objects';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'planned_contact',
    ];

    protected $casts = [
        'type' => 'int',
        'profile' => 'int',
        'cost' => 'int',
        'currency' => 'int',
        'user_id' => 'int',
        'contact_id' => 'int',
        'building_id' => 'int',
        'power' => 'int',
        'contract_status' => 'int',
        'commission' => 'int',
        'payback' => 'int',
        'bargain_limit' => 'int'
    ];

    protected $fillable = [
        'type',
        'profile',
        'cost',
        'currency',
        'user_id',
        'contact_id',
        'building_id',
        'planned_contact',
        'cadastral_numb',
        'power',
        'contract_status',
        'description',
        'commission',
        'payback',
        'bargain_limit'
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }

    public function rent_object()
    {
        return $this->hasOne(RentObject::class, 'id');
    }

    public function sale_object()
    {
        return $this->hasOne(SaleObject::class, 'id');
    }

    public function getPlannedContactAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

//    public function setPlannedContactAttribute($value)
//    {
//        $this->attributes['planned_contact'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
//    }

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
}
