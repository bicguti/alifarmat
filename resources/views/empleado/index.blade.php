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
  <title>Empleados</title>
@stop

@section('content')
<div class="row">
  <div class="large-12 columns">
    <h1 class="text-center">Empleados</h1>
   <h5>{!!link_to_route('empleado.create', $title = 'Nuevo Empleado', $parameters = null, $attributes = ['class'=>'button success']);!!}</h5>
  </div>
</div>

  @if (count($empleados) > 0)

  <div class="row">
    <div class="large-12 columns">
      <div class="tabla-responsive">



    <table>
      <thead>
        <tr>
          <th>
            #
          </th>
          <th>
            APELLIDOS
          </th>
          <th>
            NOMBRES
          </th>
          <th>
            GENERO
          </th>
          <th>
            DOMICILIO
          </th>
          <th>
            ZONA
          </th>
          <th>
            TEL.
          </th>
          <th >
            TEL. EMERGENCIAS
          </th>
          <th >
            FECHA NACIMIENTO
          </th>
          <th>
            EDAD
          </th>
          <th>
            ANTECEDENTES
          </th>
          <th>
            EMAIL
          </th>
          <th>
            DPI
          </th>
          <th>

          </th>
        </tr>
      </thead>
      <tbody>
        <?php $cont = 1; ?>
        @foreach ($empleados as $empleado)
          <tr>
            <td>
              {{ $cont++ }}
            </td>
            <td>
              {{ ucwords($empleado->apellidos_empleados) }}
            </td>
            <td >
              {{ ucwords($empleado->nombres_empleado) }}
            </td>
            <td >
              {{ ucwords($empleado->genero_empleado) }}
            </td>
            <td >
              {{ ucwords($empleado->domicilio_empleado) }}
            </td>
            <td >
              {{ ucwords($empleado->zona_empleado) }}
            </td>
            <td >
              {{ $empleado->telefono_empleado }}
            </td>
            <td >
              {{ $empleado->telefono_emergencias_empleado }}
            </td>
            <td >
              {{ $empleado->fecha_nacimiento_empleado }}
            </td>
            <td >
              {{ $empleado->edad_empleado }}
            </td>
            <td >
              @if($empleado->antecedentes_empleado == true)
                {{ "SI" }}
              @else
                {{ "NO" }}
              @endif
            </td>
            <td >
              {{ $empleado->correo_empleado }}
            </td>
            <td>
              {{ $empleado->dpi_empleado }}
            </td>
            <td >
              {!!link_to_route('empleado.edit', $title = 'Editar', $parameters = $empleado->id_empleado, $attributes = ['class'=>'button small info']);!!}
            </td>
          </tr>
        @endforeach
      </tbody>
  </table>

</div>
<div class="large-12 columns">
  {!!$empleados->render()!!}
</div>

</div>
</div>
  @else

    <h2 class="text-center">No se han registrado empleados aun.</h2>

  @endif

@stop
