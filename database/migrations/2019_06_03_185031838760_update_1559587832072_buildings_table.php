<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559587832072BuildingsTable extends Migration
{
    public function up()
    {
        Schema::table('buildings', function (Blueprint $table) {
            $table->string('type');
        });
    }

    public function down()
    {
        Schema::table('buildings', function (Blueprint $table) {
        });
    }
}
