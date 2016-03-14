@extends('plantillas.principal')
<?php
  $msg = Session::get('message');
  if ($msg != null) {
    $palabra = 'Error';
    $buscar = strpos($msg, $palabra);
  }
?>
@if ($msg != null)

  @if($buscar === false)
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Exito!</strong> {{$msg}}.
    </div>
  @else
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Error!</strong> {{$msg}}.
    </div>
  @endif

@endif

@section('title')
<title>Puestos</title>
@stop




@section('content')
<h1 class="text-center">Puesto</h1>
<h5 class="text-info"><strong><a href="{{url('/puesto/create')}}" class="btn btn-success">Agregar Puesto</a></strong><h5>


@if (count($puestos) == 0)
<h3 class="text-center text-danger">Todavía no hay Puestos registrados en la base de datos</h3>
@else


<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>
        NO
      </th>
      <th>
        NOMBRE PUESTO
      </th>
      <th>
        ESTADO PUESTO
      </th>
      <th>

      </th>
      <th>

      </th>
    </tr>
  </thead>
  <tbody>
    <?php $cont = 1; ?>
    @foreach($puestos as $puesto)
    <tr>
      <td> {{$cont++}}     </td>
    <td> {{ucfirst($puesto->nombre_puesto)}} </td>
    <td> {{ $puesto->estado_puesto }} </td>
  <!--  <td class="text-center"> <a href="#" name="prueva" value="10" class="btn btn-success">EDITAR</a>   </td> -->
  <td class="text-center">
    {!!link_to_route('puesto.edit', $title = 'Editar', $parameters = $puesto->id_puesto, $attributes = ['class'=>'btn btn-primary']);!!}
    </td>
    @if ($puesto->estado_puesto == true)
        <td class="text-center"> <a href="#" class="btn btn-danger">DESACTIVAR</a>   </td>
    @else
      <td class="text-center"> <a href="#" class="btn btn-danger">ACTIVAR</a>   </td>
    @endif

    </tr>
    @endforeach
  </tbody>
</table>

@endif

@stop
