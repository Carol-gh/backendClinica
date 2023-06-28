<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentesNopatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_nopato', function (Blueprint $table) {
            $table->id();
            $table->string('inmunizacion');
            $table->string('alcohol');
            $table->string('tabaquismo');
            $table->string('padre');
            $table->string('enfermedad_padre');
            $table->string('madre');
            $table->string('enfermedad_madre');
            $table->integer('cant_hermano');
            $table->integer('cant_vivo');
            $table->string('enfermedad_h');
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
        Schema::dropIfExists('antecedentes_nopato');
    }
}
