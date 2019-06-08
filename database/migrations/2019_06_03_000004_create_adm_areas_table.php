<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmAreasTable extends Migration
{
    public function up()
    {
        Schema::create('adm_areas', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->boolean('is_moscow')->default(0);
        });
    }
}
