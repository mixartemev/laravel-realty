<?php

namespace App;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RealtyObject
 *
 * @property int $id
 * @property int $user_id Брокер
 * @property int $contact_id Контакт
 * @property int $building_id Здание
 * @property Carbon $planned_contact Запланированная дата следующего контакта
 * @property string $cadastral_numb Кадастровый номер
 * @property float $area Площадь
 * @property int $floor Этаж
 * @property int $power Электро мощность
 * @property float $ceiling Высота потолков
 * @property int $profile Профиль помещения
 * @property int $contract_status Подписанность договора
 * @property int $cost Стоимость
 * @property int $commission Комиссия
 * @property string $description Описание
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $deleted_at
 *
 * @property Building $building
 * @property Contact $contact
 * @property User $user
 * @property Collection|Floor[] $floors
 *
 * @mixin Eloquent
 * @package App
 */
class RealtyObject extends Model
{
	use SoftDeletes;
	protected $table = 'realty_objects';

	protected $casts = [
		'user_id' => 'int',
		'contact_id' => 'int',
		'building_id' => 'int',
		'area' => 'float',
		'floor' => 'int',
		'power' => 'int',
		'ceiling' => 'float',
		'profile' => 'int',
		'contract_status' => 'int',
		'cost' => 'int',
		'commission' => 'int'
	];

	protected $dates = [
		'planned_contact'
	];

	protected $fillable = [
		'user_id',
		'contact_id',
		'building_id',
		'planned_contact',
		'cadastral_numb',
		'area',
		'floor',
		'power',
		'ceiling',
		'profile',
		'contract_status',
		'cost',
		'commission',
		'description'
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
}
