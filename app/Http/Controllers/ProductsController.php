<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function __construct(){
        $this->middleware("auth",["except"=>"show"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //consultas a travez del modelo y sus metodos
        $products=Product::all();
        //muestra la coleccion del recurso
        return view("products.index",["products"=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //desplegar la vista del formulario para crear un producto
               $product=new Product;
        return view("products.create",["product"=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valida si viene un archivo
        $hay_file=$request->hasFile('adjuntar')&&$request->adjuntar->isValid();

        //guarda el nuevo producto. recibe el formulario. de created
        $producto=new Product;
        $producto->title=$request->title;
        $producto->categoria=$request->categoria;
        $producto->description=$request->description;
        $producto->pricing=$request->pricing;
        $producto->user_id=Auth::user()->id;

        if($hay_file){
            $extension=$request->adjuntar->extension();
            $producto->extension=$extension;
        }


        if($producto->save()){
            //despues de guardar muevo la imagen
            if($hay_file){
                $request->adjuntar->storeAs('images',"$producto->id.$extension");
            }
         return redirect("/products");         
        }else{
return view("products.create",["product"=>$producto]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //muestra el producto con el id
        $product=Product::find ($id);
        return view ('products.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //muestra un formulario para editar el product con el id
      $product=Product::find ($id);
        return view("products.edit",["product"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //actualiza el product con el id lo q se envio con edit
         //guarda el nuevo producto. recibe el formulario. de created
        $producto=Product::find ($id);

        $producto->title=$request->title;
        $producto->description=$request->description;
        $producto->pricing=$request->pricing;
        $producto->categoria=$request->categoria;

        $producto->user_id=Auth::user()->id;
        if($producto->save()){
         return redirect("/products");         
        }else{
return view("products.edit",["product"=>$producto]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //elimina el producto con el id
        Product::destroy ($id);
        return redirect('/products');

    }
}







