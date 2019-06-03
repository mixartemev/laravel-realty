<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559584602986BuildingsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('buildings')) {
            Schema::create('buildings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('address');
                $table->unsignedInteger('region_id');
                $table->foreign('region_id', 'region_fk_89447')->references('id')->on('regions');
                $table->unsignedInteger('metro_station_id')->nullable();
                $table->foreign('metro_station_id', 'metro_station_fk_89448')->references('id')->on('metros');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
