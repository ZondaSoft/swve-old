<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue054sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Modelo SUE054 ()
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue054s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',4)->unique();
            $table->string('detalle',35);
            $table->integer('encargado')->nullable();
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
        Schema::dropIfExists('sue054s');
    }
}
