<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue075sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up2()
    {
        Schema::create('sue075s', function (Blueprint $table) {
            $table->integer('id')->unique();;
            $table->string('detalle',35)->nullable;
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
        Schema::dropIfExists('sue075s');
    }
}
