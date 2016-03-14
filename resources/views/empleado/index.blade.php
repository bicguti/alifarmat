@extends('plantillas.principal')

@section('title')
  <title>Empleados</title>
@stop

@section('content')
  <h1 class="text-center">Empleados</h1>
 <h5>{!!link_to_route('empleado.create', $title = 'Nuevo Empleado', $parameters = null, $attributes = ['class'=>'btn btn-success']);!!}
</h5>
  @if (count($empleados) > 0)


    <table class="table table-bordere table-hover">
      <thead>
        <tr>
          <th>
            NO
          </th>
          <th>
            APELLIDOS
          </th>
          <th>
            NOMBRES
          </th>
        </tr>
      </thead>
      <tbody>
        <?php $cont = 1; ?>
        @foreach ($empleados as $empleado)
          <tr>
            <th>
              {{ $cont++ }}
            </th>
            <td>
              {{ $empleado->nombre_empleado }}
            </td>
          </tr>
        @endforeach
      </tbody>
  </table>

  @else

    <h2 class="text-center text-info">No se han registrado empleados aun.</h2>

  @endif

@stop
