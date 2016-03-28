@extends('plantillas.principal')

@section('title')
  <title>Nuevo Proveedor</title>
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
      <h1 class="text-center">Nuevo Proveedor</h1>
      <p>Nota: Todos los campos con (*) son obligatorios.</p>
    </div>
    {!!Form::open(['route'=>'proveedor.store', 'method'=>'POST', 'data-abide'])!!}
      @include('proveedor.form.prov')
    {!!Form::close()!!}
  </div>
@endsection
