<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeh011sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veh011s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unidad',3)->nullable();
            $table->string('dominio',7)->nullable();
            $table->date('fecha')->nullable();
            $table->date('fecha_pago')->nullable();
            $table->integer('encarga')->nullable();
            $table->decimal('importe',11,2)->nullable();
            $table->string('detalle',254)->nullable();
            $table->string('estado',40)->nullable();
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
        Schema::dropIfExists('veh011s');
    }
}
