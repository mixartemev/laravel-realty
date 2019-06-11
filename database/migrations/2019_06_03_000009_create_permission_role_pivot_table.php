<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionRolePivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('permission_id');
            $table->primary(['role_id', 'permission_id']);
            $table->foreign('role_id', 'role_id_fk_89419')->references('id')->on('roles');
            $table->foreign('permission_id', 'permission_id_fk_89419')->references('id')->on('permissions');
        });
    }
}
