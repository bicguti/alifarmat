@extends('plantillas.principal')

@section('title')
  <title>Editar Proveedor</title>
@endsection

@section('content')
  <div class="row">
    <div class="large-12 columns">
      <h1 class="text-center">Editar Proveedor</h1>
      <p>Nota: Todos los campos con (*) son obligatorios.</p>
    </div>
    <div class="large-12 columns">
      {!!Form::model($proveedor, ['route'=>['proveedor.update', $proveedor->id_proveedor], 'method'=>'PUT', 'data-abide' ])!!}
        @include('proveedor.form.prov')
      {!!Form::close()!!}
    </div>
  </div>
@endsection
