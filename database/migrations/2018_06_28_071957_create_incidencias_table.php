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
            $table->string('tipoincidencia');
            $table->string('problema');
            $table->string('problemareal')->default("")->nullable();
            $table->string('solucion')->default("");
            $table->string('observaciones')->nullable();
            $table->string('facturable')->default("")->nullable();
            $table->string('estado');

            //
            //$table->rememberToken();

            //crea el campo created_at y update_at
            $table->timestamps();
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
