<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;

class ShoppingCartsController extends Controller
{
    //muestra mi carrito de compras y la coleccion de productos
    public function index(){
$shopping_cart_id=\Session::get('shopping_cart_id');
	//acceso a una vista llamada home dentro de la carpesta main
//cuando ingresen a la pagina principal le asigna un carrito
$shopping_cart=ShoppingCart::findOrCreateBySessionID($shopping_cart_id);
    //obtiene los productos en el modelo 
    $products=$shopping_cart->products()->get();
    //metodo en el modelo para extraer el total a pagar
    $total=$shopping_cart->total();
    return view("shopping_carts.index",['products'=>$products,
    'total'=>$total]);
    
    }
public function checkout(){

}

}
