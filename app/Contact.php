<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 *
 * @property int $id
 * @property string $name Наименование ЮЛ/ФЛ
 * @property string $brand_name Название бренда
 * @property string $position Должность
 * @property string $phone Телефон
 * @property string $email Email
 * @property string $web Веб сайт
 * @property string $additional_contact Доп. контакт
 * @property string $description Описание компании
 * @property string $requisites Реквизиты
 *
 * @property Collection|Order[] $orders
 * @property Collection|RealtyObject[] $realty_objects
 *
 * @mixin Eloquent
 * @package App\Models
 */
class Contact extends Model
{
	protected $table = 'contacts';

	public $timestamps = false;

    protected $fillable = [
        'name',
        'brand_name',
        'position',
        'phone',
        'email',
        'web',
        'additional_contact',
        'description',
        'requisites'
    ];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function realty_objects()
	{
		return $this->hasMany(RealtyObject::class);
	}
}
