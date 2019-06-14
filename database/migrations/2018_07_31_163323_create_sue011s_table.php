<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue011sTable extends Migration
{
    /**
     * Run the migrations.
     * Modelo SUE011 (Sectores)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue011s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',3)->unique();
            $table->string('detalle',30);
            $table->integer('tipo_horar')->nullable();
            $table->string('color')->nullable;
            $table->string('cod_horar',8)->nullable();
            $table->string('hijo_de',3)->nullable();
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
       Schema::dropIfExists('sue011s');
    }
}
