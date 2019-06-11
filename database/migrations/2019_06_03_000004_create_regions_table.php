<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegionsTable extends Migration
{
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name')->unique()->comment('Район');;
            $table->unsignedTinyInteger('adm_area_id')->nullable()->comment('Административный округ');;
            $table->foreign('adm_area_id', 'regions_adm_area_id_fkey')
                ->references('id')
                ->on('adm_areas')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buildings', function(Blueprint $table)
        {
            $table->dropForeign('regions_adm_area_id_fkey');
        });
        Schema::dropIfExists('regions');
    }
}
