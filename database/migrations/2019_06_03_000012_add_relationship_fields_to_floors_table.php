<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFloorsTable extends Migration
{
    public function up()
    {
        Schema::table('floors', function (Blueprint $table) {
            $table->unsignedInteger('building_id');
            $table->foreign('building_id', 'building_fk_89463')->references('id')->on('buildings');
        });
    }
}
