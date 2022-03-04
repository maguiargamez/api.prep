<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEleccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elecciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estatus_id')->index()->constrained('c_estatus')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('estado_id')->index()->constrained('c_estados')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('municipio_id')->index()->nullable()->constrained('c_municipios')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('tipo_eleccion_id')->constrained('c_tipo_elecciones')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('anio')->index();
            $table->integer('actas_esperadas')->nullable();
            $table->integer('actas_registradas')->nullable();
            $table->integer('actas_fuera_catalogo')->nullable();
            $table->integer('actas_capturadas')->nullable();
            $table->integer('actas_contabilizadas')->nullable();
            $table->integer('votos_total')->nullable();
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
        Schema::dropIfExists('elecciones');
    }
}
