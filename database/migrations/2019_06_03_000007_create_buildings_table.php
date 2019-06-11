<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function(Blueprint $table)
        {
            $table->increments('id')->comment('Здания');
            $table->string('address')->nullable()->comment('Адрес');
            $table->unsignedSmallInteger('region_id')->nullable()->comment('Округ / Район подмосковья');
            $table->unsignedSmallInteger('metro_station_id')->nullable()->comment('Метро');
            $table->tinyInteger('metro_distance')->nullable()->comment('Удаленность до метро');
            $table->unsignedTinyInteger('type')->comment('Тип здания');
            $table->smallInteger('area')->nullable()->comment('Общая площадь');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('region_id', 'buildings_region_id_fkey')
                ->references('id')
                ->on('regions')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
            $table->foreign('metro_station_id', 'buildings_metro_station_id_fkey')
                ->references('id')
                ->on('metro_stations')
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
            $table->dropForeign('buildings_region_id_fkey');
            $table->dropForeign('buildings_metro_station_id_fkey');
        });
        Schema::drop('buildings');
    }
}
