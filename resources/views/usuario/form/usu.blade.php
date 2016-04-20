<div class="large-12 columns">
  {!!Form::label('Buscar Persona')!!}
  <div class="row collapse">
    <div class="large-10 columns">
      {!!Form::text('apellidos_persona', null, ['placeholder'=>'e.j.  Gutiérrez López', 'required', 'id'=>'apellidos_persona'])!!}
      <small class="error">EL campo es requerido, ingrese los apellidos a buscar.</small>
    </div>
    <div class="large-2 columns">
      <button type="button" name="btn-search" id="btn-search" class="button postfix">Buscar</button>
    </div>
  </div>
</div>
<div class="large-12 columns">
  {!!Form::label('Nombre*')!!}
  {!!Form::text('name', null, ['placeholder'=>'Nombre del usuario', 'required', 'id'=>'name'])!!}
  <small class="error">El nombre es requerido</small>
</div>
<div class="large-12 columns">
  {!!Form::label('Correo*')!!}
  {!!Form::text('email', null, ['placeholder'=>'Correo electronico', 'required', 'pattern'=>'email', 'id'=>'email'])!!}
  <small class="error">El correo electronico es requerido.</small>
</div>
<div class="large-12 columns">
  {!!Form::label('Contraseña*', null)!!}
  {!!Form::password('password', ['placeholder'=>'Su contraseña', 'maxlenght'=>'20', 'minlenght'=>'5', 'required', 'pattern'=>'alpha_numeric']);!!}
  <small class="error">La contraseña es requerida y tiene que ser alfa numerico de longitud maxima de 20 y minima de 5.</small>
</div>
<div class="large-12 columns">
  {!!Form::label('Repetir contraseña*', null)!!}
  {!!Form::password('repeat_password', ['placeholder'=>'Repetir la contraseña anterior', 'maxlenght'=>'20', 'required', 'pattern'=>'alpha_numeric']);!!}
  <small class="error">La contraseña es requerida y tiene que ser alfa numerico de longitud maxima de 20 y minima de 5.</small>
</div>
<div class="large-12 columns">
  {!!Form::submit('Guardar', ['class'=>'button small'])!!}
</div>
