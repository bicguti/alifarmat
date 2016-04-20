<div class="large-12 columns">
  {!!Form::label('Nombre*')!!}
  {!!Form::text('nombre_producto', null, ['placeholder'=>'Nombre del producto', 'required', 'maxlength'=>'50'])!!}
  <small class="error">El campo es requerido, ingrese un nombre valido.</small>
</div>

<div class="large-12 columns">
  {!!Form::label('Cantidad en Inventario*')!!}
  {!!Form::text('cantidad_en_inventario', null, ['placeholder'=>'e.j. 15', 'pattern'=>'number', 'required'])!!}
  <small class="error">El campo es requerido y debe ser numerico.</small>
</div>

<div class="large-12 columns">
  {!!Form::label('Tamaño producto*', null)!!}
  {!!Form::text('tamano_producto', null, ['placeholder'=>'Tamaño del producto', 'required'=>'required', 'maxlength'=>'20'])!!}
  <small class="error">El campo el requerido.</small>
</div>

<div class="large-12 columns">
  {!!Form::label('Descripción*', null)!!}
  {!!Form::textarea('descripcion_producto', null, ['placeholder'=>'Toda la descripción del producto.', 'required', 'maxlength'=>'500'])!!}
  <small class=error>El campo es requerido</small>
</div>

<?php
  $prov = array();
  foreach ($proveedor as $key => $value) {
    $prov[$value-> id_proveedor] = mb_strtoupper($value->nombre_proveedor);
  }
 ?>
<div class="large-12 columns">
  {!!Form::label('Proveedor*', null)!!}
  {!!Form::select('id_proveedor', $prov , null, ['placeholder'=>'Seleccione al proveedor del producto...', 'required'])!!}
  <small class="error">El campo es requerido, seleccione una opción.</small>
</div>


<div class="large-12 columns">
  {!!Form::submit('Guardar', ['class'=>'button small'])!!}
</div>
