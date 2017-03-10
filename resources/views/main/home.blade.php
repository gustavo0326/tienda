@extends('layouts.app')

@section('title','Productos')

@section('content')
<h1>Bienvenidos a esta Tienda</h1>

    <div class=" text-center products-container">

        @foreach($productos as $product)
            <div class="col-xs-10 col-sm-6">
            @include("products.product",["product"=>$product])
            </div>
            @endforeach


    </div>

<div class="pagination" >
    {{$productos->links()}}
</div>
@endsection
