<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559584310624MetrosTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('metros')) {
            Schema::create('metros', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('line');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('metros');
    }
}
