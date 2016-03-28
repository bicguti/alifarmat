@extends('plantillas.principal')

@section('title')
  <title>Editar Presentación de Producto</title>
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
  <div class="row">
    <div class="large-12 columns">
      <h1 class="text-center">Editar Presentación de Producto</h1>
      <p>Nota: Todos los campos con (*) son obligatorios.</p>
    </div>
    {!!Form::model($presentacion, ['route'=>['presproducto.update', $presentacion->id_presentacion_producto], 'method'=>'PUT', 'data-abide' ])!!}

      @include('presproducto.form.pres')

    {!!Form::close()!!}
  </div>
@endsection
