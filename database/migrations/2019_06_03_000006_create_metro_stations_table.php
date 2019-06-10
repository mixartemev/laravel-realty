<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetroStationsTable extends Migration
{
    public function up()
    {
        Schema::create('metro_stations', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 255);
            $table->enum('line', [
                'Сокольническая линия',
                'Арбатско-Покровская линия',
                'Замоскворецкая линия',
                'Калужско-Рижская линия',
                'Таганско-Краснопресненская линия',
                'Серпуховско-Тимирязевская линия',
                'Кольцевая линия',
                'Филёвская линия',
                'Люблинско-Дмитровская линия',
                'Солнцевская линия',
                'Кожуховская линия',
                'Каховская линия',
                'Калининская линия',
                'Московское центральное кольцо',
                'Большая кольцевая линия',
                'Бутовская линия Лёгкого метро',
                'Московская монорельсовая транспортная система',
            ]);
            $table->unique('name', 'line');
            $table->unsignedSmallInteger('region_id');
            $table->foreign('region_id', 'metro_stations_region_id_fkey')
                ->references('id')
                ->on('regions')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
        });
    }
}
