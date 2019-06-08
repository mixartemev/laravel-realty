<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name')->unique();
            $table->unsignedSmallInteger('adm_area_id')->nullable();
            $table->foreign('adm_area_id', 'regions_adm_area_id_fkey')
                ->references('id')
                ->on('adm_areas')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
        });
    }
}
