<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable()->comment('Наименование ЮЛ/ФЛ');
			$table->string('brand_name')->nullable()->comment('Название бренда');
			$table->string('position')->default('')->comment('Должность');
			$table->bigInteger('phone')->nullable()->comment('Телефон');
			$table->string('email')->nullable()->comment('Email');
			$table->string('additional_contact')->nullable()->comment('Доп. контакт');
			$table->text('company_description')->nullable()->comment('Описание компании');
			$table->smallInteger('requisites')->nullable()->comment('Реквизиты');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contacts');
	}

}
