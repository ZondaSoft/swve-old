<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue071sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue071s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('periodo',7)->unique();
            $table->string('detalle',45);
            $table->string('activo',2)->nullable();
            $table->boolean('exportado')->nullable();
            $table->date('desde')->nullable();
            $table->date('hasta')->nullable();
            $table->date('quincena')->nullable();
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
        Schema::dropIfExists('sue071s');
    }
}
