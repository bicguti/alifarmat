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
  <title>Productos</title>
@endsection

@section('content')
  <div class="row">
    <div class="large-12 columns">
      <h1 class="text-center">Productos</h1>
    </div>
    <div class="large-12 columns">
      {!!link_to_route('producto.create', $title = 'Nuevo Producto', $parameters = null, $attributes = ['class'=>'button small success'])!!}
    </div>
    @if(count($productos)>0)
      <div class="large-12 columns">
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
              @foreach ($productos as $key => $prod)
                <tr>
                  <td>
                    {{ $key + 1 }}
                  </td>
                  <td>
                    {{ ucwords($prod->nombre_producto) }}
                  </td>
                  <td>
                    {!!link_to_route('producto.edit', $title = 'Editar Producto', $parameters = $prod->id_producto, $attributes = ['class'=>'button small info'])!!}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @else
      <div class="large-12 columns">
        <h1 class="text-center">No se han registrado productos aun.</h1>
      </div>
    @endif
  </div>
@endsection
