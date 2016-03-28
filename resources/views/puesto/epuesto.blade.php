@extends('plantillas.principal')
@section('title')
<title>Editar Puesto</title>
@stop
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
    <h1 class="text-center">Editar Puesto</h1>
    <p class="text-info">Nota: Todos los campos con (*) son obligatorios.</p>
  </div>
</div>

{!!Form::model($puesto, ['route'=>['puesto.update', $puesto->id_puesto], 'method'=>'PUT', 'data-abide'])!!}
  <div class="row">
    <div class="large-12 columns">
      <div class="name-field">
        {!!Form::label('Nombre Puesto*',null)!!}
        {!!Form::text('nombre_puesto', null, ['placeholder'=>'nombre del puesto', 'maxlength'=>'45', 'required'=>'required', 'autocomplete'=>'off', 'pattern'=>'[a-zA-Z]+'])!!}
        <small class="error">El nombre puesto es requerido, por favor ingrese un nombre.</small>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
        {!!Form::submit('Guardar', ['class'=>'button small'])!!}
    </div>
  </div>
{!!Form::close()!!}

@stop
