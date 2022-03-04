<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('eleccion_id')->index()->constrained('elecciones')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('casilla_id')->index()->constrained('casillas')->cascadeOnDelete()->cascadeOnUpdate();

            $table->integer('total_boletas_recibidas');
            $table->integer('total_boletas_sobrantes');
            $table->integer('total_personas_votaron');
            $table->integer('total_rep_partido_ci_votaron');

            $table->json('votos');
            $table->integer('total_votos_cnr'); //Candidatos no registraso
            $table->integer('total_votos_nulos');

            $table->integer('total_votos');
            $table->integer('lista_nominal')->nullable();
            $table->integer('representantes_pp_ci')->nullable();
            $table->text('observaciones')->nullable();
            $table->boolean('contabilizada')->default(false);
            $table->integer('mecanismo_traslado')->nullable();
            $table->text('sha')->nullable();
            $table->dateTime('fecha_hora_acopio', $precision = 0)->nullable();
            $table->dateTime('fecha_hora_captura', $precision = 0)->nullable();
            $table->dateTime('fecha_hora_verificacion', $precision = 0)->nullable();
            $table->string('origen')->index()->nullable();
            $table->string('digitalizacion')->index()->nullable();
            $table->string('tipo_documento')->default("ACTA PREP");

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
        Schema::dropIfExists('actas');
    }
}
