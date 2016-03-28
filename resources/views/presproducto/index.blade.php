@extends('plantillas.principal')
<!--verificacion de mensage de error -->
<?php
  $msg = Session::get('message');
  if ($msg != null) {
    $palabra = 'Error';
    $buscar = strpos($msg, $palabra);
  }
?>
<!-- verifiacmos sis existe el mensage de error -->
@if ($msg != null)
  <!-- dependiendo del tipo de mensaje, si es de error se muestra un alert con fondo rojo -->
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
  <title>Presentación de Productos</title>
@endsection

@section('content')

  <div class="row">
    <div class="large-12 columns text-center">
      <h1>Presentación de Producto</h1>
    </div>
  </div>

  <div class="row">
    <div class="large-12 columns">
      {!!link_to_route('presproducto.create', $title = 'Nueva Presentacion', $parameters = null, $attributes = ['class'=>'button small success'])!!}
    </div>
    <div class="large-12 columns">
      @if(count($presproducto)>0)


      <div class="tabla-responsive">
        <table>
          <thead>
            <tr>
              <th>
                #
              </th>
              <th>
                NOMBRE
              </th>
              <th>
                OPERACION
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($presproducto as $key => $pres)
              <tr>
                <td>
                  {{ $key+1 }}
                </td>
                <td>
                  {{ mb_strtoupper($pres->nombre_presentacion_producto) }}
                </td>
                <td>
                  {{ link_to_route('presproducto.edit', $title = 'Editar Presentación', $parameters = $pres->id_presentacion_producto, $attributes = ['class'=>'button small info']) }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      @else
          <h2>Todavía no se han registrado presentaciones de producto</h2>
      @endif

    </div> <!-- fin de la columna -->
  </div>

@endsection
