@extends('plantillas.principal')

@section('title')
  <title>Nueva Presentacion Producto</title>
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
      <h1 class="text-center">Nueva Presentación de Producto</h1>
      <p>Nota: Todos los campos con (*) son obligatorios.</p>
    </div>

      {!!Form::open(['route'=>'presproducto.store', 'method'=>'POST', 'data-abide'])!!}
        <!-- Inclimos los campos que se neceistan -->
        @include('presproducto.form.pres')

      {!!Form::close()!!}

  </div>

@endsection
