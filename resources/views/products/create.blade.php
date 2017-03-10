@extends("layouts.app");
@section("content")
<div class="container white">
	<h1>Nuevo producto</h1>
	<!--formulario fallada utilizandi libreria con composer "laravelcollective/html":"5.3.*@dev"-->

@include('products.form',['product'=>$product,'url'=>
'/products','method'=>'POST'])
</div>

@endsection