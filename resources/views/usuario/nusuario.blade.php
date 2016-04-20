@extends('plantillas.principal')

@section('title')
  <title>Nuevo Usuario</title>
@endsection

@section('content')

  @if($errors->has())
    @foreach ($errors->all() as $error)
       <div data-alert class="alert-box alert">
         {{ $error }}
         <a href="#" class="close">&times;</a>
       </div>
   @endforeach
  @endif
  
  <div class="row">
    <div class="large-12 columns">
      <h1 class="text-center">Nuevo Usuario</h1>
      <p>Nota: Todos los campos con (*) son requeridos</p>
    </div>
    {!!Form::open(['route'=>'usuario.store', 'method'=>'POST', 'data-abide'])!!}
      @include('usuario.form.usu')
    {!!Form::close()!!}
  </div>
@endsection

<div id="ventanaModal" class="reveal-modal content-cargando" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <div class="main_body">
    <div class="element">
        <div class="loading2">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
  </div>
</div>
