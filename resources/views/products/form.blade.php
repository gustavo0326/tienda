{!! Form::open(['url'=> $url,'method'=> $method,'files'=>true]) !!}

<div class="form-group">
	{{Form::text('title',$product->title,['class'=>'form-control','placeholder'=>'Titulo'])}}
</div>

<div class="form-group">
{{Form::number('pricing',$product->pricing,['class'=>'form-control','placeholder'=>'precio de tu producto en centavos de dólar'])}}
</div>
<div class="form-group">
	{{Form::select('categoria',[
    'tecnologia' => 'tecnologia',
    'Masculino' => 'Masculino'],$product->categoria,['class'=>'form-control','placeholder'=>'Categoria'])}}
</div>
<div class="form-control">
	{{Form::file('adjuntar')}}
</div>

<div class="form-group">
	{{Form::textarea('description',$product->description,['class'=>'form-control','placeholder'=>'Describa el producto'])}}
</div>
<div class="form-group text-right">
	<a href="{{url('/products')}}">Regresar al listado de productos</a>
	<input type="submit" value="Enviar" class="btn btn-success"></input>
</div>
{!! Form::close() !!}