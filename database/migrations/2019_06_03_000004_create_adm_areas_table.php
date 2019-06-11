<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdmAreasTable extends Migration
{
    public function up()
    {
        Schema::create('adm_areas', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->boolean('is_moscow')->default(0)->comment('В Москве');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adm_areas');
    }
}
