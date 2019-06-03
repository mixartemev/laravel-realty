<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559592871097RealtyObjectsTable extends Migration
{
    public function up()
    {
        Schema::table('realty_objects', function (Blueprint $table) {
            $table->dropForeign('building_fk_89472');
            $table->dropColumn('building_id');
            $table->dropColumn('floor');
        });
        Schema::table('realty_objects', function (Blueprint $table) {
            $table->float('ceiling', 4, 2)->nullable()->change();
            $table->unsignedInteger('floor_id');
            $table->foreign('floor_id', 'floor_fk_89646')->references('id')->on('floors');
        });
    }

    public function down()
    {
        Schema::table('realty_objects', function (Blueprint $table) {
        });
    }
}
