<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Libros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('libros', function(Blueprint $table){
            $table->engine = "InnoDB";

            $table->bigIncrements('id');

            // Se crea la llave foránea
            // como este campo va a estar relacionado se el método usa unsigned()
            $table->bigInteger('categoria_id')->unsigned();
            $table->string('nombre');

            $table->timestamps();

            // <<< Indicar la tabla con la que se va a relacionar >>>

            /* Se indica cuál es la llave foránea seguido de que columna es a la que va a hacer referencia
            y la tabla a la que pertenece esa llave con la que se hace la relación. 
            onDelete("cascade") indica que si se elimina algún elemento en la tabla categorias, entonces, se
            eliminaran los elementos en libros que tengan como llave foránea a esa columna*/
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete("cascade");

            
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
