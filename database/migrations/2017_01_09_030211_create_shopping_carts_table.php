<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartsTable extends Migration
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
        Schema::create('shopping_carts',function(Blueprint $tabla){
            $tabla->increments("id");
           
            $tabla->string('status');
           

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
        //
        Schema::drop('shoping_carts');
    }
}
