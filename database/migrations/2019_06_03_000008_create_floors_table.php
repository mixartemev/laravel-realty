<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFloorsTable extends Migration
{
    public function up()
    {
        Schema::create('floors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('number')->comment('Номер');
            $table->unsignedTinyInteger('type')->comment('Тип');
            $table->unsignedSmallInteger('area')->nullable()->comment('Площадь на этаже');
            $table->decimal('ceiling', 4, 2)->nullable()->comment('Высота потолков');
            $table->unsignedInteger('realty_object_id')->comment('Блок');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('realty_object_id', 'floors_realty_object_id_fkey')
                ->references('id')
                ->on('realty_objects')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('floors', function(Blueprint $table)
        {
            $table->dropForeign('floors_realty_object_id_fkey');
        });
        Schema::drop('floors');
    }
}
