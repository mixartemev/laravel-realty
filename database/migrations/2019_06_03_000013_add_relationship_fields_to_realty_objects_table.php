<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRealtyObjectsTable extends Migration
{
    public function up()
    {
        Schema::table('realty_objects', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_89470')->references('id')->on('users');
            $table->unsignedInteger('floor_id');
            $table->foreign('floor_id', 'floor_fk_89646')->references('id')->on('floors');
        });
    }
}
