<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBuildingsTable extends Migration
{
    public function up()
    {
        Schema::table('buildings', function (Blueprint $table) {
            $table->unsignedInteger('region_id');
            $table->foreign('region_id', 'region_fk_89447')->references('id')->on('regions');
            $table->unsignedInteger('metro_station_id')->nullable();
            $table->foreign('metro_station_id', 'metro_station_fk_89458')->references('id')->on('metro_stations');
        });
    }
}
