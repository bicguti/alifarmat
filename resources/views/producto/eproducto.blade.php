@extends('plantillas.principal')

@section('title')
  <title>Editar Producto</title>
@endsection

@section('content')
  @if($errors->has())
    @foreach ($errors->all() as $error)
       <div data-alert class="alert-box alert">
         {{ $error }}
         <a href="#" class="close">&times;</a>
       </div>
   @endforeach
       @endif
  <section class="row">
    <div class="large-12 columns">
      <h1 class="text-center">Editar Producto</h1>
      <p>
        Nota: Todos los campos con (*) son obligatorios.
      </p>
    </div>
    <div class="large-12 columns">
      {!!Form::model($producto, ['route'=>['producto.update', $producto->id_producto], 'method'=>'PUT', 'data-abide'])!!}
        @include('producto.form.prod')
      {!!Form::close()!!}
    </div>
  </section>
@endsection
