<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casillas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estatus_casilla_id')->index()->constrained('c_estatus_casillas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('eleccion_id')->index()->constrained('elecciones')->cascadeOnDelete()->cascadeOnUpdate();

            //Datos de la casilla
            $table->foreignId('estado_id')->index()->constrained('c_estados')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('estado');
            $table->foreignId('municipio_id')->index()->constrained('c_municipios')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('municipio');

            $table->integer('seccion')->index();
            $table->string('tipo_seccion');
            $table->string('padron_electoral')->nullable();
            $table->string('tipo_casilla');
            $table->string('casilla');
            $table->text('domicilio')->nullable();
            $table->text('ubicacion')->nullable();
            $table->text('referencia')->nullable();
            $table->text('tipo_domicilio')->nullable();

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
        Schema::dropIfExists('casillas');
    }
}
