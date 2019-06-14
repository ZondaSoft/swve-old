<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSue001sTable extends Migration
{
    /**
     * Run the migrations.
     * Modelo SUE001 (Legajos)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sue001s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->unique();
            $table->string('detalle',30);
            $table->string('nombres',30);
            $table->string('cuil',13)->nullable();
            $table->date('alta')->nullable();
            $table->date('baja')->nullable();
            $table->string('domici',40)->nullable();
            $table->string('nro',7)->nullable();
            $table->string('piso',4)->nullable();
            $table->string('dpto',4)->nullable();
            $table->string('locali',20)->nullable();
            $table->string('provin',2)->nullable();
            $table->string('cod_pos',10)->nullable();
            $table->string('telef',35)->nullable();
            $table->string('num_jub',10)->nullable();
            $table->string('num_inscri',20)->nullable();
            $table->string('reg_jub',1)->nullable();
            $table->string('afjp',25)->nullable();  // estaba como afip
            $table->integer('num_doc')->nullable();
            $table->string('tipo_doc',2)->nullable();
            $table->string('condicion',1)->nullable();
            $table->string('convenio',5)->nullable();
            $table->string('situacion',1)->nullable();
            $table->string('forma_pago',2)->nullable();
            $table->string('est_civil',1)->nullable();
            $table->string('salud',1)->nullable();
            $table->string('incap',1)->nullable();
            $table->string('nacionali',10)->nullable();
            $table->string('sexo',1)->nullable();
            $table->date('fecha_naci')->nullable();
            $table->string('cod_centro',3)->nullable();
            $table->string('cod_jerarq',3)->nullable();
            $table->string('cod_categ',4)->nullable();
            $table->string('funcion',20)->nullable();
            $table->string('explota',4)->nullable();
            $table->string('cod_contra',3)->nullable();
            $table->string('cod_obraso',3)->nullable();
            $table->string('cod_sindic',2)->nullable();
            $table->string('cod_explot',2)->nullable();
            $table->string('cod_segvid',2)->nullable();
            $table->string('num_segvid',2)->nullable();
            $table->integer('adher')->nullable();
            $table->integer('mod_sijp')->nullable();
            $table->integer('sit_sijp')->nullable();
            $table->integer('cond_sijp')->nullable();
            $table->integer('acti_sijp')->nullable();
            $table->string('local_sijp',2)->nullable();
            $table->string('obra_sijp',6)->nullable();
            $table->string('sinie_sijp',2)->nullable();
            $table->string('formap',1)->nullable();
            $table->string('banco',3)->nullable();
            $table->string('sucursal',20)->nullable();
            $table->string('cuenta',20)->nullable();
            $table->string('nuevo',1)->nullable();
            $table->string('error',1)->nullable();
            $table->string('cod_obsoc',6)->nullable();
            $table->string('codsector',3)->nullable();
            $table->string('tel1',20)->nullable();
            $table->string('tel2',20)->nullable();
            $table->string('tel3',20)->nullable();
            $table->string('email',45)->nullable();
            $table->string('web',45)->nullable();
            $table->string('coment',254)->nullable();
            $table->string('cuadrilla',4)->nullable();
            $table->integer('antig')->nullable();
            $table->date('fec_ult')->nullable();
            $table->integer('pend1')->nullable();
            $table->integer('pend2')->nullable();
            $table->integer('pend3')->nullable();
            $table->integer('pend4')->nullable();
            $table->boolean('aux01')->nullable();
            $table->boolean('aux02')->nullable();
            $table->boolean('aux03')->nullable();
            $table->boolean('aux04')->nullable();
            $table->boolean('aux05')->nullable();
            $table->boolean('aux06')->nullable();
            $table->boolean('aux07')->nullable();
            $table->boolean('aux08')->nullable();
            $table->boolean('aux09')->nullable();
            $table->boolean('aux10')->nullable();
            $table->boolean('reloj_usa')->nullable();
            $table->string('cod_fichad',20)->nullable();
            $table->integer('tomar_sect')->nullable();
            $table->integer('tipo_horar')->nullable();
            $table->string('cod_horar',15)->nullable();
            $table->integer('ficha_int')->nullable();
            $table->integer('nec_aut_ex')->nullable();
            $table->integer('nec_aut_sa')->nullable();
            $table->date('ultima_act')->nullable();
            $table->float('por_des1')->nullable();
            $table->boolean('preg1')->nullable();
            $table->boolean('preg2')->nullable();
            $table->boolean('preg3')->nullable();
            $table->boolean('preg4')->nullable();
            $table->boolean('preg5')->nullable();
            $table->boolean('preg6')->nullable();
            $table->boolean('preg7')->nullable();
            $table->boolean('preg8')->nullable();
            $table->boolean('preg9')->nullable();
            $table->boolean('preg10')->nullable();
            $table->boolean('preg11')->nullable();
            $table->boolean('preg12')->nullable();
            $table->boolean('preg13')->nullable();
            $table->boolean('preg14')->nullable();
            $table->boolean('preg15')->nullable();
            $table->string('deta1',20)->nullable();
            $table->string('deta2',20)->nullable();
            $table->string('deta3',20)->nullable();
            $table->date('deta4')->nullable();
            $table->string('deta5',20)->nullable();
            $table->string('deta6',20)->nullable();
            $table->string('deta7',20)->nullable();
            $table->string('deta8',20)->nullable();
            $table->string('deta9',20)->nullable();
            $table->string('deta10',20)->nullable();
            $table->string('deta11',20)->nullable();
            $table->string('deta12',20)->nullable();
            $table->string('deta13',20)->nullable();
            $table->string('deta14',20)->nullable();
            $table->string('deta15',20)->nullable();
            $table->string('deta16',20)->nullable();
            $table->string('deta17',20)->nullable();
            $table->string('deta18',20)->nullable();
            $table->string('deta19',20)->nullable();
            $table->string('deta20',20)->nullable();
            $table->string('coment2',254)->nullable();
            $table->string('coment3',254)->nullable();
            $table->string('foto',254)->nullable();
            $table->string('foto_carn',254)->nullable();
            $table->string('barrio',25)->nullable();
            $table->integer('mod_cto')->nullable();
            $table->string('grupo_emp',2)->nullable();
            $table->string('cbu',22)->nullable();
            $table->boolean('reloj_ignora')->nullable();
            $table->boolean('pago_asist')->nullable();
            $table->date('fecha_vto')->nullable();
            $table->boolean('pago_prese')->nullable();
            $table->boolean('reloj_ignext')->nullable();
            $table->timestamps();


            // FK
            $table->foreign('cod_centro')->references('codigo')->on('sue030s');
            $table->foreign('cod_jerarq')->references('codigo')->on('sue014s');
            $table->foreign('codsector')->references('codigo')->on('sue011s');
            $table->foreign('cod_categ')->references('codigo')->on('sue006s');
            $table->foreign('provin')->references('codigo')->on('sue012s');
            $table->foreign('mod_cto')->references('codigo')->on('sue107s');
            $table->foreign('grupo_emp')->references('codigo')->on('sue086s');
            $table->foreign('cod_obsoc')->references('codigo')->on('sue009s');
            $table->foreign('cod_sindic')->references('codigo')->on('sue015s');
            $table->foreign('convenio')->references('codigo')->on('sue007s');
            $table->foreign('cuadrilla')->references('codigo')->on('sue054s');
            $table->foreign('cod_horar')->references('codigo')->on('sue094s');
            $table->foreign('banco')->references('codigo')->on('fza002s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sue001s');
    }
}