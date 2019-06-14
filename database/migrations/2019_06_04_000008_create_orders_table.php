<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->tinyInteger('status')->nullable()->comment('Статус');
			$table->unsignedInteger('contact_id')->comment('Контактное лицо');
			$table->string('profile')->nullable()->comment('Профиль');
			$table->unsignedTinyInteger('type')->comment('Вид');
			$table->unsignedSmallInteger('min_area')->nullable()->comment('от');
			$table->unsignedSmallInteger('max_area')->nullable()->comment('до');
			$table->unsignedSmallInteger('region_id')->comment('Регион поиска');

            $table->integer('budget')->nullable()->comment('Бюджет');
            $table->string('comments')->nullable()->comment('Коментарии');

            $table->foreign('contact_id', 'orders_contact_id_fkey')->references('id')
                ->on('contacts')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('orders', function(Blueprint $table)
        {
            $table->dropForeign('orders_contact_id_fkey');
        });
		Schema::drop('orders');
	}

}
