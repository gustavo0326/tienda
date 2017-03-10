<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //funcion realizar cambios-.crear table
        //clase schema ..varios metodos para una tabla
        Schema::create('products',function(Blueprint $tabla){
            $tabla->increments("id");
            $tabla->integer('user_id')->unsigned()->index();
            $tabla->string('title');
            $tabla->text('description');
            $tabla->string('categoria');
            $tabla->decimal('pricing',9,2);//centavos


            //contiene fecha de creacion f. actualizacion
            $tabla->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //funcion revertir los mismos cambios-..eliminar table
        Schema::drop('products');
    }
}






