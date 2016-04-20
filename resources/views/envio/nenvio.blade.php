@extends('plantillas.principal')

@section('title')
  <title>Nuevo Envío</title>
@endsection

@section('content')
  <div class="row">
    <div class="large-12 columns">
      <h1 class="text-center">Nuevo Envío</h1>
      <p>
        Nota: Todos los campos con (*) son obligatorios.
      </p>
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      {!!Form::open(['route'=>'envio.store', 'method'=>'POST', 'data-abide'])!!}
      <div class="large-12 columns">
        {!!Form::label('presentacion_producto', 'Presentación de Producto*')!!}
        {!!Form::select('id_presentacion_producto', $array = array(), null, ['placeholder'=>'Seleccionepresentación de producto'])!!}
      </div>
      {!!Form::close()!!}
    </div>
  </div>
@endsection
