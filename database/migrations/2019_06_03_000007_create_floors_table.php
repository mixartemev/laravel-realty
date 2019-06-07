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
            $table->integer('number');
            $table->integer('area')->nullable();
            $table->float('ceiling', 4, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
