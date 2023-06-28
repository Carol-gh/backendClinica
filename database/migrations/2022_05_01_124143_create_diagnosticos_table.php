<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('receta');
            $table->unsignedBigInteger('id_cita');
            $table->foreign('id_cita')->on('citas')->references('id'); 
            $table->unsignedBigInteger('id_medico');
            $table->foreign('id_medico')->on('medicos')->references('id'); 
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
        Schema::dropIfExists('diagnosticos');
    }
}
