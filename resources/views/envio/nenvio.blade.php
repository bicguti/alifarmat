@extends('plantillas.principal')

@section('title')
  <title>Nuevo Envío</title>
@endsection

@section('content')
  <div class="row">
    <div class="large-12 columns">
      <h1 class="text-center">Nuevo Envío</h1>
      <p>
        Nota: Todos los campos con (*) son obligatorios.
      </p>
    </div>
  </div>
  <?php
$presentacion = array();
foreach ($presentaciones as $key => $pres) {
  $presentacion[$pres->id_presentacion_producto] = ucwords($pres->nombre_presentacion_producto);
}
   ?>
  <div class="row">
    <div class="large-12 columns">
      {!!Form::open(['route'=>'envio.store', 'method'=>'POST', 'data-abide'])!!}

      <fieldset>
        <legend>Cliente</legend>
        <div class="large-12 columns">
          {!!Form::label('nit', 'No. Nit*')!!}
          {!!Form::text('nit', null, ['placeholder'=>'No nit del cliente.'])!!}
        </div>
      </fieldset>

      <fieldset>
        <legend>Envio</legend>
      <div class="large-12 columns">
        {!!Form::label('presentacion_producto', 'Presentación de Producto*')!!}
        {!!Form::select('id_presentacion_producto', $presentacion, null, ['placeholder'=>'Seleccione presentación de producto...', 'id'=>'idPresentProd'])!!}
      </div>
      <div class="large-12 columns">
        <div class="tabla-responsive">
          <table>
            <thead>
              <tr>
                <th>
                  Nombre Presentación
                </th>
                <th>
                  Cantidad Unidades
                </th>
                <th>
                  Precio Presentación
                </th>
              </tr>
            </thead>
            <tbody id="cuerpoTabla">

            </tbody>
          </table>
        </div>
      </div>
    </fieldset>
      <input type="hidden" value="{{ csrf_token() }}" id="token">
      {!!Form::close()!!}
    </div>
  </div>

  @include('msgs.cargamodal')<!-- Incluimos el html para el mensaje de carga -->

@endsection
