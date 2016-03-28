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
    <div data-alert class="alert-box success">
      <strong>Exito!</strong> {{ $msg }}
      <a href="#" class="close">&times;</a>
    </div>
  @else
    <div data-alert class="alert-box alert">
      <strong>Error!</strong> {{ $msg }}
      <a href="#" class="close">&times;</a>
    </div>
  @endif

@endif

@section('title')
<title>Puestos</title>
@stop




@section('content')
<div class="row">
  <div class="large-12 columns text-center">
    <h1>Puesto</h1>
  </div>
</div>
<div class="row">
  <div class="large-12 colums">
    <h5 class="text-info"><strong><a href="{{url('/puesto/create')}}" class="button small success">Agregar Puesto</a></strong><h5>
  </div>
</div>

<div class="row">
  <div class="large-12 columns">
    @if (count($puestos) == 0)
    <h3 class="text-center text-danger">Todavía no hay Puestos registrados en la base de datos</h3>
    @else

<div class="tabla-responsive">
    <table>
      <thead>
        <tr>
          <th>
            #
          </th>
          <th >
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
        {!!link_to_route('puesto.edit', $title = 'Editar', $parameters = $puesto->id_puesto, $attributes = ['class'=>'button small info']);!!}
        </td>
        @if ($puesto->estado_puesto == true)
            <td class="text-center"> <a href="#" class="button small alert">DESACTIVAR</a>   </td>
        @else
          <td class="text-center"> <a href="#" class="button small alert">ACTIVAR</a>   </td>
        @endif

        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>


@endif

@stop
