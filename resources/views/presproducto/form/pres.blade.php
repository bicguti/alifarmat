<div class="large-12 columns">
  {!!Form::label('Nombre*', null)!!}
  {!!Form::text('nombre_presentacion_producto', null, ['placeholder'=>'Nombres de presentación de producto', 'required'=>'required', 'maxlength'=>'50', 'pattern'=>'[a-zA-Z]+'])!!}
  <small class="error">El nombre es requerido, por favor ingrese un nombre valido.</small>
</div>
<div class="large-12 columns">
  {!!Form::submit('Guardar', ['class'=>'button small'])!!}
</div>
