<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('incidencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('habitacion');
            $table->string('servicio_id');
            $table->string('categoria_id')->default("")->nullable();
            $table->string('enunciado_id');
            $table->string('problema_id')->default("")->nullable();
            $table->string('solucion_id')->default("")->nullable();
            $table->string('facturable_id')->default("")->nullable();
            $table->string('observacionescliente')->nullable();
            $table->string('observacionestecnico')->nullable();
            $table->string('estado');

            //$table->rememberToken();

            //crea el campo created_at y update_at
            $table->timestamps();
            $table->dateTime('pospuesto_at')->nullable();
            $table->dateTime('solution_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}
