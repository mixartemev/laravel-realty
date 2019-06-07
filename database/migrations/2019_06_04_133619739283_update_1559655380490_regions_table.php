<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1559655380490RegionsTable extends Migration
{
    public function up()
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->boolean('is_moscow')->default(0)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('regions', function (Blueprint $table) {
        });
    }
}
