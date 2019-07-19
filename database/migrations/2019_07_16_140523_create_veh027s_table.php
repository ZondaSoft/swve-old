<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeh027sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veh027s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dominio',7)->nullable();
            $table->string('codigo',3)->nullable();
            $table->string('comprador',50)->nullable();
            $table->string('domic',50)->nullable();
            $table->string('telefono1',30)->nullable();
            $table->string('telefono2',30)->nullable();
            $table->string('email',50)->nullable();
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
        Schema::dropIfExists('veh027s');
    }
}
