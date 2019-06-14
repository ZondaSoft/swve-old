<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue031sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue031s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',6)->unique();
            $table->string('detalle',40);
            $table->string('codigo2',2);
            $table->boolean('lote')->nullable;
            $table->string('comentario')->nullable;
            $table->string('tipo',35)->nullable;
            $table->boolean('lote_leg')->nullable;
            $table->boolean('lote_cc')->nullable;
            $table->boolean('lote_loc')->nullable;
            $table->boolean('cantidad')->nullable;
            $table->integer('color')->nullable;
            $table->string('comenta2')->nullable;
            $table->string('comenta3')->nullable;
            $table->boolean('lcomenta')->nullable;
            $table->integer('man_aut')->nullable();
            $table->string('formula')->nullable;
            $table->string('cod_sue',5)->nullable;
            $table->boolean('activo')->nullable;
            $table->integer('tope_max')->nullable();
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
        Schema::dropIfExists('sue031s');
    }
}
