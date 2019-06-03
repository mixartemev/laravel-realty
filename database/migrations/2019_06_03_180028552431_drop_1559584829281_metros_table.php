<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1559584829281MetrosTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('metros');
    }
}
