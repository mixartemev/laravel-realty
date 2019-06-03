<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559585061345BuildingsTable extends Migration
{
    public function up()
    {
        Schema::table('buildings', function (Blueprint $table) {
            $table->dropForeign('metro_station_fk_89448');
            $table->dropColumn('metro_station_id');
        });
        Schema::table('buildings', function (Blueprint $table) {
            $table->unsignedInteger('metro_station_id')->nullable();
            $table->foreign('metro_station_id', 'metro_station_fk_89458')->references('id')->on('metro_stations');
        });
    }

    public function down()
    {
        Schema::table('buildings', function (Blueprint $table) {
        });
    }
}
