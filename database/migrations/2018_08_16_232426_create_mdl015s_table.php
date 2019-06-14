<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdl015sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mdl015s', function (Blueprint $table) {
            $table->increments('id');

            $table->string('codigo',5)->unique();
            $table->string('detalle',50);
            $table->string('comenta')->nullable();
            $table->integer('dias')->nullable();
            $table->boolean('total')->nullable();
            $table->boolean('ocult_dias')->nullable();

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
        Schema::dropIfExists('mdl015s');
    }
}
