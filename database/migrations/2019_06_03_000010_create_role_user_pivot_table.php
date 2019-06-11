<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoleUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('role_id');
            $table->primary(['user_id', 'role_id']);
            $table->foreign('user_id', 'user_id_fk_89428')->references('id')->on('users');
            $table->foreign('role_id', 'role_id_fk_89428')->references('id')->on('roles');
        });
    }
}
