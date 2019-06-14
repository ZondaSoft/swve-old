<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue091sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Modelo SUE091 (Parametrizacion de relojes)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue091s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->unique();
            $table->string('detalle',40);
            $table->string('Modelo',25)->nullable();
            $table->string('Serie',30)->nullable();
            $table->string('grupo',10)->nullable();
            $table->string('estado',20)->nullable();
            $table->string('ipo_com',7)->nullable();
            $table->string('ip',15)->nullable();
            $table->string('Puerto',5)->nullable();
            $table->string('archivo',254)->nullable();
            $table->integer('longitud')->nullable();
            $table->integer('minimo')->nullable();
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
        Schema::dropIfExists('sue091s');
    }
}
