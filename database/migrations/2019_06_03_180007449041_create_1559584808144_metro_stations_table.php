<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559584808144MetroStationsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('metro_stations')) {
            Schema::create('metro_stations', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('line');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('metro_stations');
    }
}
