<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue030sTable extends Migration
{
    /**
     * Run the migrations.
     * Modelo SUE030 (Centros de costo)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue030s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',4)->unique();
            $table->string('detalle',35);
            $table->string('responsa',35)->nullable();;
            $table->string('domicilio',35)->nullable();;
            $table->string('localidad',30)->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sue030s');
    }
}
