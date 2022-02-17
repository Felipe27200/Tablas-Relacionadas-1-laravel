<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Categorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Se debe usar el método create() para poder crear la tabla en la BD
        /* El primer argumento es el nombre de la tabla y el otro es una función
           para definir su estructura */
        Schema::create('categorias', function (Blueprint $table){

            // Quiere decir que todos los elementos que tengan un id o esa llave foránea
            // serán eliminados, si esta se elimina, eso es lo que indica InnoDB
            $table->engine = "InnoDB";

            // ESTRUCTURA DE LA TABLA

            $table->bigIncrements('id');
            $table->string('nombre');

            // requerida
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
        //
    }
}
