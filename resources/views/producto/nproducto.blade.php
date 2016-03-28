
@extends('plantillas.principal')

@section('title')
  <title>Nuevo Producto</title>
@endsection

@section('content')
<div class="row">
  <div class="large-12 columns">
    <h1 class="text-center">Nuevo Producto</h1>
    <p>Nota: Todos los campos con (*) son obligatorios.</p>
  </div>
  {!!Form::open(['route'=>'producto.store', 'method'=>'POST', 'data-abide'])!!}

    @include('producto.form.prod')

  {!!Form::close()!!}
</div>
@endsection
