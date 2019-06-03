<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559587364567FloorsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('floors')) {
            Schema::create('floors', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('number');
                $table->integer('area')->nullable();
                $table->float('ceiling', 4, 2)->nullable();
                $table->unsignedInteger('building_id');
                $table->foreign('building_id', 'building_fk_89463')->references('id')->on('buildings');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('floors');
    }
}
