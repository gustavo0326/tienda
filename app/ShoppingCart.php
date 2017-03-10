<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//metodos integradores (reunen todas las funcionalidades) 
//y metodos de funcionalidad (hacen 1 sola cosa)

class ShoppingCart extends Model
{      //Mas assignment se crea un arreglo con los atributos a utilizar para funcione *ml
protected $fillable=['status'];

public function inShoppingCarts(){
    return $this->hasMany('App\InShoppingCart');
}
public function products(){
    return $this->belongsToMany('App\Product','in_shopping_carts');
}
    //recibimos una session y si es nula la crea.y si la encuentra
    //la utiliza y la retorna
    public function productsSize(){
        return $this->products()->count();
    }

public function total(){
    return $this->products()->sum("pricing");
}

    public static function findOrCreateBySessionID($shopping_cart_id){
                 if ($shopping_cart_id) 
                     # busca el carrito cpn el id
                     return ShoppingCart::findBySession($shopping_cart_id);
                  else 
                     # crea carrito de compras...
            return ShoppingCart::createWithoutSession();
    }
public static function findBySession($shopping_cart_id)
{
    # code...buscamos el carrito
    return ShoppingCart::find($shopping_cart_id);                 
    }
public static function createWithoutSession(){
    //creamos el carrito ..toda la creacion se hace con una sola linea
    /*$shopping_cart=new ShoppingCart;
    $shopping_cart->status="incompleted";
    $shopping_cart->save();
    return ShoppingCard;*/
    //metodo de laravel recibeun arreglo *ml
    return ShoppingCart::create(["status"=>"incompleted"]);
}

}
