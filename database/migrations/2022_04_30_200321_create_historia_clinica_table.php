<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaClinicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_clinica', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('enfermedad_act');
            $table->string('diagnostico');
            $table->string('plan_terapeutico');
            
            $table->unsignedBigInteger('id_paciente');
            $table->foreign('id_paciente')->on('pacientes')->references('id'); 
            $table->unsignedBigInteger('id_medico');
            $table->foreign('id_medico')->on('medicos')->references('id'); 
            $table->unsignedBigInteger('id_antep');
            $table->foreign('id_antep')->on('antecedentes_pato')->references('id'); 
            $table->unsignedBigInteger('id_antenp');
            $table->foreign('id_antenp')->on('antecedentes_nopato')->references('id'); 
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
        Schema::dropIfExists('historia_clinica');
    }
}
