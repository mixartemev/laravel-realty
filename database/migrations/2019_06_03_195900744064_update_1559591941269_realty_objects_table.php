<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559591941269RealtyObjectsTable extends Migration
{
    public function up()
    {
        Schema::table('realty_objects', function (Blueprint $table) {
            $table->float('ceiling', 4, 2)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('realty_objects', function (Blueprint $table) {
        });
    }
}
