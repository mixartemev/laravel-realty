<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealtyObjectsTable extends Migration
{
    public function up()
    {
        Schema::create('realty_objects', function (Blueprint $table) {
            /** Common */
            $table->increments('id');
            // there is floors
            $table->unsignedTinyInteger('type')->comment('Тип площади');
            $table->unsignedTinyInteger('profile')->comment('Классификация помещения');

            $table->unsignedInteger('cost')->comment('Стоимость');
            $table->unsignedTinyInteger('currency')->default(1)->comment('Валюта');

            $table->unsignedInteger('user_id')->comment('Брокер');
            $table->unsignedInteger('contact_id')->nullable()->comment('Контакт');
            $table->unsignedInteger('building_id')->comment('Здание');

            $table->date('planned_contact')->nullable()->comment('Запланированная дата следующего контакта');
            $table->string('cadastral_numb')->nullable()->comment('Кадастровый номер');
            $table->smallInteger('power')->nullable()->comment('Электро мощность');
            $table->tinyInteger('contract_status')->default(1)->comment('Подписанность договора');
            $table->tinyInteger('commission')->nullable()->comment('Комиссия');
            $table->text('description')->nullable()->comment('Описание');

            $table->integer('payback')->nullable()->comment('Окупаемость');
            $table->integer('bargain_limit')->nullable()->comment('Торг до');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id', 'realty_objects_user_id_fkey')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
            $table->foreign('contact_id', 'realty_objects_contact_id_fkey')
                ->references('id')
                ->on('contacts')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
            $table->foreign('building_id', 'realty_objects_building_id_fkey')
                ->references('id')
                ->on('buildings')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('realty_objects', function(Blueprint $table)
        {
            $table->dropForeign('realty_objects_user_id_fkey');
            $table->dropForeign('realty_objects_contact_id_fkey');
            $table->dropForeign('realty_objects_building_id_fkey');
        });
        Schema::drop('realty_objects');
    }
}
