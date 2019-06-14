<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue107sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Modelo SUE107 (Tipos/modalidad de contrataciones)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue107s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->unique();
            $table->string('detalle',40);
            $table->integer('duracion')->nullable();
            $table->integer('aviso')->nullable();
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
        Schema::dropIfExists('sue107s');
    }
}
