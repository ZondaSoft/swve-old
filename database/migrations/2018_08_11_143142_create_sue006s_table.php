<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue006sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Modelo SUE006 (Categorias)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue006s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',4)->unique();
            $table->string('detalle',30);
            $table->integer('sue_bas')->nullable();;
            $table->integer('hsnormal')->nullable();;
            $table->integer('hsmin')->nullable();;
            $table->integer('hsmax')->nullable();;
            $table->string('cod_conve',5)->nullable();;


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
        Schema::dropIfExists('sue006s');
    }
}
