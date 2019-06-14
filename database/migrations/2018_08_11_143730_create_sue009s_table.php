<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue009sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Modelo SUE009 (Obras Sociales)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue009s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',6)->unique();
            $table->string('detalle',50);
            $table->string('localidad',25)->nullable();;
            $table->string('cp',10)->nullable();;
            $table->string('tel1',20)->nullable();
            $table->string('tel2',20)->nullable();
            $table->string('tel3',20)->nullable();
            $table->string('email',45)->nullable();
            $table->string('web',45)->nullable();
            $table->string('contacto',45)->nullable();

            $table->decimal('con_os',5,2)->nullable();
            $table->decimal('apo_os',5,2)->nullable();
            $table->decimal('fijo_apo',11,2)->nullable();
            $table->decimal('fijo_con',11,2)->nullable();
            $table->decimal('Desde_sue1',11,2)->nullable();
            $table->decimal('Hasta_sue1',11,2)->nullable();
            $table->decimal('por_os1',11,2)->nullable();
            $table->decimal('por_ans1',11,2)->nullable();
            $table->decimal('Desde_sue2',11,2)->nullable();
            $table->decimal('Hasta_sue2',11,2)->nullable();
            $table->decimal('por_os2',11,2)->nullable();
            $table->decimal('por_ans2',11,2)->nullable();

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
        Schema::dropIfExists('sue009s');
    }
}
