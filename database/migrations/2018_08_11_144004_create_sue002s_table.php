<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue002sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Modelo SUE002 (Familiares)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue002s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('legajo');
            $table->string('cuit',13)->nullable();
            $table->string('paren',4)->nullable();
            $table->string('apellido',30)->nullable();
            $table->string('nombres',30)->nullable();
            $table->string('apecasado',30)->nullable();
            $table->date('falta')->nullable();
            $table->date('fbaja')->nullable();
            $table->string('sexo',1)->nullable();
            $table->date('fnacim')->nullable();
            $table->string('codnacion',3)->nullable();
            $table->string('nacion',20)->nullable();
            $table->string('tipodoc',3)->nullable();
            $table->integer('numdoc')->nullable();
            $table->string('cuil',13)->nullable();
            $table->string('estudios',4)->nullable();
            $table->string('ecivil',1)->nullable();
            $table->string('esalud',1)->nullable();
            $table->string('esadher',1)->nullable();
            $table->string('trabaja',1)->nullable();
            
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
        Schema::dropIfExists('sue002s');
    }
}
