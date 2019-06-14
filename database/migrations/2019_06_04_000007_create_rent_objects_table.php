<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRentObjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rent_objects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->smallInteger('rental_rate')->nullable()->comment('Арендная ставка');
			$table->smallInteger('taxation')->nullable()->comment('Налог');
			$table->smallInteger('contract_term')->nullable()->comment('Окупаемость');
			$table->smallInteger('indexing')->nullable()->comment('Индексация');
			$table->smallInteger('direct')->nullable()->comment('Прямая аренда');
			$table->smallInteger('commission')->nullable()->comment('Комиссия %');
			$table->integer('bargain_limit')->nullable()->comment('Торг до');
            $table->timestamps();

            $table->foreign('id', 'rent_objects_id_fkey')->references('id')
                ->on('realty_objects')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('rent_objects', function(Blueprint $table)
        {
            $table->dropForeign('rent_objects_id_fkey');
        });
        Schema::drop('rent_objects');
	}

}
