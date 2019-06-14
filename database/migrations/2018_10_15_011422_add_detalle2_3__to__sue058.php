<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetalle23ToSue058 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('sue058s', function (Blueprint $table) {
          $table->string('detalle2',40)->nullable(); // Campo nuevo
          $table->string('detalle3',40)->nullable(); // Campo nuevo
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('sue058s', function (Blueprint $table) {
          $table->dropColumn('detalle2'); // Campo nuevo
          $table->dropColumn('detalle3'); // Campo nuevo
      });
    }
}
