@extends('plantillas.principal')

@section('title')
    <title>Envios</title>
@endsection

@section('content')
  <div class="row">
    <div class="large-12 columns">
      <h1 class="text-center">Envios</h1>
    </div>
    <div class="large-12 columns">
      <h5>{!!link_to_route('envio.create', $title = 'Nuevo Envio', $parameters = null, $attributes = ['class'=>'button success']);!!}</h5>
    </div>
  </div>
@endsection
