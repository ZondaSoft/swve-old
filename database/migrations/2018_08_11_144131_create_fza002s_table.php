<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFza002sTable extends Migration
{
    /**
     * Run the migrations.
     * FZA002 - Bancos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fza002s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',3)->unique();
            $table->string('detalle',30);
            $table->string('telefono',30)->nullable();
            $table->string('contacto',30)->nullable();

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
        Schema::dropIfExists('fza002s');
    }
}
