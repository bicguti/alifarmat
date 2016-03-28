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
  <title>Proveedores</title>
@endsection

@section('content')
  <div class="row">
    <div class="large-12 columns">
      <h1 class="text-center">Proveedores</h1>
    </div>
    <div class="large-12 columns">
      {!!link_to_route('proveedor.create', $title = 'Nuevo Proveedor', $parameters = null, $attributes = ['class'=>'button small success'])!!}
    </div>
    @if(count($provedores)>0)
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
                  TELEFONO
                </th>
                <th>
                  ACCIÓN
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($provedores as $key => $prov)
                <tr>
                  <td>
                    {{ $key+1 }}
                  </td>
                  <td>
                    {{ $prov->nombre_proveedor }}
                  </td>
                  <td>
                    {{ $prov->telefono_proveedor }}
                  </td>
                  <td>
                    {!!link_to_route('proveedor.edit', $title = 'Editar Proveedor', $parameters = $prov->id_proveedor, $attributes = ['class'=>'button small info'])!!}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @else
      <div class="large-12 columns">
        <h2 class="text-center">No se han registrado provedores aun.</h2>
      </div>
    @endif
  </div>
@endsection
