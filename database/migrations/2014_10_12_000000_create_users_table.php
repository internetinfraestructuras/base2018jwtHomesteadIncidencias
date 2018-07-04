<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.asdf sdaf
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('nombre_completo');
            $table->string('tipocliente');
            $table->string('cif');
            $table->string('direccion');
            $table->string('poblacion');
            $table->integer('intentoslogin')->default(0);



 //        'cif','direccion','poblacion','intentoslogin','ipwowzalocal','preciopoblacion',

            //
            $table->rememberToken();

            //crea el campo created_at y update_at
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
        Schema::dropIfExists('users');
    }
}
