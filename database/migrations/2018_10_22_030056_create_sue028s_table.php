<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue028sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up2()
    {
        Schema::create('sue028s', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha')->nullable();
            $table->integer('legajo')->nullable();
            $table->string('cod_nov',6)->nullable();
            $table->decimal('cantidad',11,2)->default(0);
            $table->string('comenta1',40)->nullable();
            $table->string('comenta2',40)->nullable();
            $table->string('comenta3',40)->nullable();
            $table->boolean('lcomenta')->nullable();
            $table->string('periodo',6)->nullable();
            $table->integer('int_enf')->default(0);
            $table->integer('int_acc')->default(0);
            $table->integer('int_susp')->default(0);
            $table->integer('int_aperc')->default(0);
            $table->string('observac')->nullable();
            $table->boolean('reloj')->nullable();
            $table->string('user',20)->nullable();
            $table->datetime('time_stamp')->nullable();
            $table->string('machine',20)->nullable();
            $table->integer('planilla')->default(0);
            $table->integer('id_imagen')->default(0);
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
        Schema::dropIfExists('sue028s');
    }
}
