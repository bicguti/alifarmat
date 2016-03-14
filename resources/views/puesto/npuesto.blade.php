@extends('plantillas.principal')
@section('title')
<title>Nuevo Puestos</title>
@stop
@section('content')
  @if($errors->has())
           <div class="alert alert-warning" role="alert">
              @foreach ($errors->all() as $error)
                 <div>{{ $error }}</div>
             @endforeach
           </div>
       @endif </br>
<h1 class="text-center">Nuevo Puesto</h1>
<p class="text-info">Nota: Todos los campos con (*) son obligatorios.</p>
{!!Form::open(['route'=>'puesto.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!}
  <div class="form-group">
    {!!Form::label('Nombre Puesto*',null ,['class'=>'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
      {!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'nombre del puesto', 'maxlength'=>'45', 'required'=>'required', 'autocomplete'=>'off'])!!}
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!!Form::submit('Guardar', ['class'=>'btn btn-primary'])!!}
    </div>
  </div>
{!!Form::close()!!}
@stop
