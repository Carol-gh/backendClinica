<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentesPatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_pato', function (Blueprint $table) {
            $table->id();
            $table->string('cardiovas');
            $table->string('pulmonar');
            $table->string('digestivo');
            $table->string('diabetes');
            $table->string('renales');
            $table->string('quirurgico');
            $table->string('alergico');
            $table->string('transfusion');
            $table->string('medicamento');
            $table->string('descripcion');
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
        Schema::dropIfExists('antecedentes_pato');
    }
}
