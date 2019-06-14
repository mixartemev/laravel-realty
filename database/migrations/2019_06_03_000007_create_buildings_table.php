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
            $table->string('address')->comment('Адрес');
            $table->unsignedSmallInteger('region_id')->comment('Округ / Район подмосковья');
            $table->unsignedSmallInteger('metro_station_id')->nullable()->comment('Метро');
            $table->unsignedTinyInteger('metro_distance')->nullable()->comment('Удаленность до метро');
            $table->unsignedTinyInteger('metro_distance_type')->nullable()->comment('Пешком/транспортом');
            $table->unsignedTinyInteger('type')->comment('Тип');
            $table->enum('class', ['A','B','C','D'])->nullable()->comment('Класс');
            $table->date('realise_date')->nullable()->comment('Ввод в эксплуатацию');
            $table->unsignedSmallInteger('area')->nullable()->comment('Общая площадь');
            $table->unsignedTinyInteger('floors')->nullable()->comment('Этажность');
            $table->text('description')->nullable()->comment('Описание');

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
