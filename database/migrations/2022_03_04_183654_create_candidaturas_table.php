<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidaturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('eleccion_id')->index()->constrained('elecciones')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('tipo_candidatura_id')->index()->constrained('c_estatus')->cascadeOnDelete()->cascadeOnUpdate(); //Partido, Colaciion, Independiente
            $table->string('candidatura_propietaria');
            $table->string('foto')->nullable();
            $table->string('coaliciones')->nullable();
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
        Schema::dropIfExists('candidaturas');
    }
}
