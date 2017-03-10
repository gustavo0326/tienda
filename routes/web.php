<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});*/

//la ruta principal redirige a un controlador y un metodo llamado home
Route::get('/', 'MainController@home');
Route::get('/carrito','ShoppingCartsController@index');
Route::post('/carrito','ShoppingCartsController@checkout');

Auth::routes();
//agrego el controlador de recurso ..creado
/*el cual tiene los metodos
Get/products=>index --muestra una coleccion
Post/products=>store --aguarda el producto 
Get/products/create=>formulario para crear
Get/products/:id=>mostrar un producto con id
Get/products/:id/edit  --formulario de edicion
Put/Patch/products/:id actualiza producto
Delete/products/:id elimina un product con id
*/
Route::resource('products','ProductsController');
Route::resource('in_shopping_carts','InShoppingCartsController',
['only'=>['store','destroy']]);
Route::get('/home', 'HomeController@index');


Route::get('products/images/{filename}',function($filename){
    //accedo a la imagen en una carpeta
$path=storage_path("app/images/$filename");
    if(!\File::exists($path))abort(404);
    $file=\File::get($path);
    $type=\File::mimeType($path);
    $response=Response::make($file,200);
    $response->header("Content-Type",$type);
    return $response;
});
