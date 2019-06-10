<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloorsTable extends Migration
{
    public function up()
    {
        Schema::create('floors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('number');
            $table->unsignedSmallInteger('area')->nullable();
            $table->decimal('ceiling', 4, 2)->nullable();
            $table->unsignedInteger('building_id');
            $table->foreign('building_id', 'building_fk_89463')->references('id')->on('buildings');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
