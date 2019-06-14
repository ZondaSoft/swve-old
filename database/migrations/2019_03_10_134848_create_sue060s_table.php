<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue060sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue060s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('interno')->default(0);
            $table->integer('legajo')->nullable();
            $table->string('apynom',40)->nullable();
            $table->string('sector',3)->nullable();
            $table->string('cuadrilla',4)->nullable();
            $table->string('hora',5)->nullable();
            $table->integer('dias')->nullable();
            $table->date('fecha')->nullable();
            $table->date('fecha2')->nullable();
            $table->string('comenta1',40)->nullable();
            $table->string('comenta2',40)->nullable();
            $table->string('comenta3',40)->nullable();
            $table->string('diagnost',7)->nullable();
            $table->string('cod_nov',6)->nullable();
            $table->integer('numero')->nullable();
            $table->string('imagen',254)->nullable();
            $table->timestamps();


            // FK
            $table->foreign('legajo')->references('codigo')->on('sue001s');
            $table->foreign('cod_nov')->references('codigo')->on('sue031s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sue060s');
    }
}
