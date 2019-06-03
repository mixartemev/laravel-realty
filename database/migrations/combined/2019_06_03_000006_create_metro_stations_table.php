<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetroStationsTable extends Migration
{
    public function up()
    {
        Schema::create('metro_stations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('line');
            $table->timestamps();
        });
    }
}
