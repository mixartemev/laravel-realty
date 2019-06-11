<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealtyObjectsTable extends Migration
{
    public function up()
    {
        Schema::create('realty_objects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('Брокер');
            $table->unsignedInteger('contact_id')->nullable()->comment('Контакт');
            $table->unsignedInteger('building_id')->comment('Здание');
            $table->date('planned_contact')->nullable()->comment('Запланированная дата следующего контакта');
            $table->string('cadastral_numb')->nullable()->comment('Кадастровый номер');
            $table->decimal('area',5,2)->comment('Площадь');
            $table->smallInteger('floor')->nullable()->comment('Этаж');
            $table->smallInteger('power')->nullable()->comment('Электро мощность');
            $table->decimal('ceiling', 4,2)->nullable()->comment('Высота потолков');
            $table->tinyInteger('profile')->default(1)->comment('Профиль помещения');
            $table->tinyInteger('contract_status')->default(1)->comment('Подписанность договора');
            $table->tinyInteger('cost')->nullable()->comment('Стоимость');
            $table->tinyInteger('commission')->nullable()->comment('Комиссия');
            $table->string('description')->nullable()->comment('Описание');

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
