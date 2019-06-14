<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSaleObjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sale_objects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->smallInteger('deal_type')->nullable()->comment('Окупаемость');
			$table->integer('price')->nullable()->comment('Окупаемость');

            $table->foreign('id', 'sale_objects_id_fkey')->references('id')
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
        Schema::table('sale_objects', function(Blueprint $table)
        {
            $table->dropForeign('sale_objects_id_fkey');
        });
		Schema::drop('sale_objects');
	}

}
