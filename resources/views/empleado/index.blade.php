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
  <title>Empleados</title>
@stop

@section('content')
  <h1 class="text-center">Empleados</h1>
 <h5>{!!link_to_route('empleado.create', $title = 'Nuevo Empleado', $parameters = null, $attributes = ['class'=>'btn btn-success']);!!}
</h5>
  @if (count($empleados) > 0)
    <div class="col-sm-12">


    <div class="table-responsive">



    <table class="table table-bordered table-hover">
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
          <th nowrap>
            TEL. EMERGENCIAS
          </th>
          <th nowrap>
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
            <td nowrap>
              {{ ucwords($empleado->apellidos_empleados) }}
            </td>
            <td nowrap>
              {{ ucwords($empleado->nombres_empleado) }}
            </td>
            <td nowrap>
              {{ ucwords($empleado->genero_empleado) }}
            </td>
            <td nowrap>
              {{ ucwords($empleado->domicilio_empleado) }}
            </td>
            <td nowrap>
              {{ ucwords($empleado->zona_empleado) }}
            </td>
            <td nowrap>
              {{ $empleado->telefono_empleado }}
            </td>
            <td nowrap>
              {{ $empleado->telefono_emergencias_empleado }}
            </td>
            <td nowrap>
              {{ $empleado->fecha_nacimiento_empleado }}
            </td>
            <td nowrap>
              {{ $empleado->edad_empleado }}
            </td>
            <td nowrap>
              @if($empleado->antecedentes_empleado == true)
                {{ "SI" }}
              @else
                {{ "NO" }}
              @endif
            </td>
            <td nowrap>
              {{ $empleado->correo_empleado }}
            </td>
            <td>
              {{ $empleado->dpi_empleado }}
            </td>
            <td nowrap>
              {!!link_to_route('empleado.edit', $title = 'Editar', $parameters = $empleado->id_empleado, $attributes = ['class'=>'btn btn-primary']);!!}
            </td>
          </tr>
        @endforeach
      </tbody>
  </table>

  </div>
  </div>
  @else

    <h2 class="text-center text-info">No se han registrado empleados aun.</h2>

  @endif

@stop
