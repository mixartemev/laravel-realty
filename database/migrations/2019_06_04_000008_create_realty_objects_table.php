<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealtyObjectsTable extends Migration
{
    public function up()
    {
        Schema::create('realty_objects', function (Blueprint $table) {
            $table->increments('id');
            $table->date('planned_contact')->nullable();
            $table->string('cadastral_numb')->nullable();
            $table->float('area', 4, 1);
            $table->integer('power')->nullable();
            $table->float('ceiling', 4, 2)->nullable();
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
