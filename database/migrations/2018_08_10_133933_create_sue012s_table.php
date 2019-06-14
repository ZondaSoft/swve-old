<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue012sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Modelo SUE012 (Provincias)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue012s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',2)->unique();
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
        Schema::dropIfExists('sue012s');
    }
}
