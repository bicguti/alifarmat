<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Autenticación de Usuario</title>
      {!!Html::style('/css/foundation.min.css')!!}
      {!!Html::style('/css/jquery-ui.min.css')!!}
      {!!Html::style('css/estilos.css')!!}
      {!!Html::script('/js/jquery-2.1.4.min.js')!!}
      {!!Html::script('/js/jquery-ui-1.11.4.custom/jquery-ui.min.js')!!}
      {!!Html::script('js/vendor/modernizr.js')!!}
  </head>
  <body>
    <div class="row">
      <div class="large-12 columns">
        <h1>Alifarmat S.A.</h1>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns">
        <h3 class="text-center">Ingresar</h3>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns">
        @if (Session::has('message-error'))
          <div data-alert class="alert-box warning">
            {{Session::get('message-error')}}
            <a href="#" class="close">&times;</a>
          </div>
        @endif
      </div>
      <div class="large-12 columns">
        @if (count($errors)>0)
          @foreach ($errors->all() as $error)
            <div data-alert class="alert-box warning">
              {!!$error!!}
              <a href="#" class="close">&times;</a>
            </div>
          @endforeach

        @endif
      </div>
    </div>
    <div class="row">
        {!!Form::open(['route'=>'autenticacion.store', 'method'=>'POST', 'data-abide'])!!}
      <div class="large-12 columns">
        {!!Form::label('Email')!!}
        {!!Form::text('email', null, ['placeholder'=>'Dirección de correo', 'pattern'=>'email', 'required'])!!}
        <small class="error">El correo es requerido, por favor ingrese un correo valido.</small>
      </div>
      <div class="large-12 columns">
        {!!Form::label('Contraseña', null)!!}
        {!!Form::password('password', ['placeholder'=>'Su contraseña', 'required'])!!}
        <small class="error">La contraseña es requerida, por favor ingrese un nombre valido.</small>
      </div>
      <div class="large-12 columns">
        {!!Form::submit('Guardar', ['class'=>' button small success'])!!}
      </div>
      {!!Form::close()!!}
    </div>
    {!!Html::script('/js/foundation.min.js')!!}
    <script type="text/javascript">
      $(document).foundation();
    </script>
  </body>
</html>
