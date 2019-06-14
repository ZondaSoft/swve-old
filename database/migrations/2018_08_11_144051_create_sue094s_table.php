<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue094sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Modelo SUE094 (Horarios Fijos (relojes))
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue094s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',8)->unique();
            $table->string('detalle',30);
            $table->integer('feriado')->nullable();
            $table->string('tempra1',5)->nullable();
            $table->string('tarde1',5)->nullable();
            $table->string('tempra2',5)->nullable();
            $table->string('tarde2',5)->nullable();
            $table->boolean('intro')->nullable();
            $table->boolean('paga_extra')->nullable();
            $table->boolean('paga_noct')->nullable();
            $table->string('tope_diario',5)->nullable();
            
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
        Schema::dropIfExists('sue094s');
    }
}
