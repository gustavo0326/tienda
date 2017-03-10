<?php
//name space para que si alguien guarda un archivo con el mismo nombre no exosta conflicto

namespace App\Http\Controllers;
//importar los request
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
//para hacer uso del modelo Shoping importo la class_exists

/**
*
*/
class MainController extends Controller
{



public function home()
{
   $products=Product::latest()->simplePaginate(4);

	return view('main.home',["productos"=>$products]);
}
}





 ?>
