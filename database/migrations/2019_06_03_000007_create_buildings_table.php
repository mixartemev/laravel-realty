<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('type');
            $table->string('profile');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedSmallInteger('metro_station_id')->nullable();
            $table->foreign('metro_station_id', 'buildings_metro_station_id_fkey')
                ->references('id')
                ->on('metro_stations')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
            $table->unsignedSmallInteger('region_id');
            $table->foreign('region_id', 'buildings_region_id_fkey')
                ->references('id')
                ->on('regions')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
        });
    }
}
