<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559588046135BuildingsTable extends Migration
{
    public function up()
    {
        Schema::table('buildings', function (Blueprint $table) {
            $table->string('profile');
        });
    }

    public function down()
    {
        Schema::table('buildings', function (Blueprint $table) {
        });
    }
}
