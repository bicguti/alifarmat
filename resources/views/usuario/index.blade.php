@extends('plantillas.principal')

@section('title')
  <title>Usuarios</title>
@endsection

@section('content')
  @if (Session::has('message'))
    <div data-alert class="alert-box success">
      {{Session::get('message')}}
      <a href="#" class="close">&times;</a>
    </div>
  @endif
  <div class="row">
    <div class="large-12 columns">
      <h1 class="text-center">Usuarios</h1>
    </div>
    <div class="large-12 columns">
      {!!link_to_route('usuario.create', $title = 'Nuevo Usuario', $parameters = null, $attributes = ['class'=>'button small success'])!!}
    </div>
    {{ count($usuarios) }}
    @if (count($usuarios) > 0)
        <div class="tabla-responsive">
          <table>
            <thead>
              <tr>
                <th> # </th>
                <th> NOMBRE </th>
                <th> CORREO </th>
                <th> OPERACIÓN</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($usuarios as $key => $usuario)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $usuario->name }}</td>
                  <td>{{ $usuario->email }}</td>
                  <td>{!!link_to_route('usuario.edit', $title = 'Editar Usuario', $parameters = $usuario->id, $attributes = ['class'=>'button small info'])!!}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
      <div class="large-12 columns">
        <h1>No se han registrado usuarios aun.</h1>
      </div>
      @endif
  </div>
@endsection
