<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPorXxx1ToSue009 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('sue009s', function (Blueprint $table) {
          $table->decimal('por_has_1',11,2)->nullable(); // Campo nuevo
          $table->decimal('por_may_1',11,2)->nullable(); // Campo nuevo
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('sue009s', function (Blueprint $table) {
          $table->dropColumn('por_has_1'); // Campo nuevo
          $table->dropColumn('por_may_1'); // Campo nuevo
      });
    }
}
