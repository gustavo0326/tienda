<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ShoppingCart; 

class ShoppingCartProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //insertamos variables en las vistas * todas
        view()->composer("*",function ($view){
            $shopping_cart_id=\Session::get('shopping_cart_id');
	//acceso a una vista llamada home dentro de la carpesta main
//cuando ingresen a la pagina principal le asigna un carrito
$shopping_cart=ShoppingCart::findOrCreateBySessionID($shopping_cart_id);
\Session::put("shopping_cart_id",$shopping_cart->id);
$view->with("productsCount",$shopping_cart->productsSize());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
