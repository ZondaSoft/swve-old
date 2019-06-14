<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue015sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Modelo SUE015 - Sindicatos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue015s', function (Blueprint $table) {
            $table->increments('id');

            $table->string('codigo',2)->unique();
            $table->string('detalle',30);
            $table->string('localidad',25)->nullable();;
            $table->string('cp',10)->nullable();;
            $table->string('tel1',20)->nullable();
            $table->string('tel2',20)->nullable();
            $table->string('tel3',20)->nullable();
            $table->string('email',45)->nullable();
            $table->string('web',45)->nullable();
            $table->string('contacto',45)->nullable();

            $table->decimal('porce_con',11,2)->nullable();
            $table->decimal('porce_apo',11,2)->nullable();
            $table->decimal('fijo_apo',11,2)->nullable();
            $table->decimal('fijo_con',11,2)->nullable();

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
        Schema::dropIfExists('sue015s');
    }
}
