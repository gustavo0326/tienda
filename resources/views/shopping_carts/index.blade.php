@extends("layouts.app")
@section("content")
<div class="big-padding text-center blue-grey white-text">
    <h1>Tu carrito de compras</h1>
</div>
<div class="container">

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Producto</th>
             <th>Precio</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($products as $products ) 
       
    
        <tr>
            <td>{{$products->title}}</td>
            <td>{{$products->pricing}}</td>
        </tr>
        @endforeach
        <tr>
        <td>Total</td>
        <td>{{$total}}</td>
        </tr>

    </tbody>
</table>
    <div class="text-right">
         @include("shopping_carts.form")
    </div>
</div>
@endsection