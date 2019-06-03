<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559590045397RealtyObjectsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('realty_objects')) {
            Schema::create('realty_objects', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id');
                $table->foreign('user_id', 'user_fk_89470')->references('id')->on('users');
                $table->date('planned_contact')->nullable();
                $table->unsignedInteger('building_id');
                $table->foreign('building_id', 'building_fk_89472')->references('id')->on('buildings');
                $table->string('cadastral_numb')->nullable();
                $table->float('area', 4, 1);
                $table->integer('floor')->nullable();
                $table->integer('power')->nullable();
                $table->float('ceiling', 2, 4)->nullable();
                $table->string('contract_status');
                $table->float('commission', 4, 1)->nullable();
                $table->longText('description')->nullable();
                $table->decimal('cost', 15, 2)->nullable();
                $table->decimal('cost_m', 15, 2)->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('realty_objects');
    }
}
