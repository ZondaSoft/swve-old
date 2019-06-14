<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue014sTable extends Migration
{
    /**
     * Run the migrations.
     * Modelo SUE014 (Jerarquias)
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('sue014s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',3)->unique();
            $table->string('detalle',30);
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
        Schema::dropIfExists('sue014s');
    }
}
