@extends('plantillas.principal')

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
                    {{ $key }}
                  </td>
                  <td>
                    {{ $prod->nombre_producto }}
                  </td>
                  <td>
                    {!!link_to_route('empleado.edit', $title = 'Editar Producto', $parameters = $prod->id_producto, $attributes = ['class'=>'button small info'])!!}
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
