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
  <div class="row collapse">
    {!!Form::label('Precio Venta*', null)!!}
    <div class="small-1 large-1 columns">
      <span class="prefix">Q</span>
    </div>
    <div class="small-11 large-11 columns">
      {!!Form::text('precio_producto_vta', null, ['placeholder'=>'e.j. 15.90', 'pattern'=>'^[0-9]+([.]\d+)?$', 'required'])!!}
      <small class="error">El campo es requerido y unicamente con valores decimales.</small>
    </div>
  </div>
</div>

<div class="large-12 columns">
  <div class="row collapse">
      {!!Form::label('Costo Producto*', null)!!}
    <div class="small-1 large-1 columns">
      <span class="prefix">Q</span>
    </div>
    <div class="small-11 large-11 columns">
      {!!Form::text('costo_producto', null, ['placeholder'=>'e.j. 10.90', 'required', 'pattern'=>'^[0-9]+([.]\d+)?$'])!!}
      <small class="error">El campo es requerido y unicamente con valores decimales.</small>
    </div>
  </div>
</div>

<div class="large-12 columns">
  {!!Form::label('Descripción*', null)!!}
  {!!Form::textarea('descripcion_producto', null, ['placeholder'=>'Toda la descripción del producto.', 'required', 'maxlength'=>'500'])!!}
  <small class=error>El campo es requerido</small>
</div>

<div class="large-12 columns">
  {!!Form::label('Proveedor*', null)!!}
  {!!Form::select('id_proveedor', $pres=array(), null, ['placeholder'=>'Seleccione presentacion...', 'required'])!!}
  <small class="error">El campo es requerido, seleccione una opción.</small>
</div>

<?php
  $pres = array();
  foreach ($presentaciones as $key => $value) {
    $pres[$value->id_presentacion_producto] = mb_strtoupper($value->nombre_presentacion_producto);
  }
 ?>

<div class="large-12 columns">
  {!!Form::label('Presentación producto*', null)!!}
  {!!Form::select('id_presentacion_producto', $pres, null, ['placeholder'=>'Seleccione presentacion...', 'required'])!!}
  <small class="error">El campo es requerido, seleccione una opción.</small>
</div>

<div class="large-12 columns">
  {!!Form::label('Fecha de caducidad*', null)!!}
  {!!Form::text('caducidad_producto', null, ['class'=>'datepicker', 'placeholder'=>'e.j. 2016-02-22', 'required', 'pattern'=>'date'])!!}
  <small class="error">El campo es requerido y con el formato año-mes-día</small>
</div>

<div class="large-12 columns">
  {!!Form::submit('Guardar', ['class'=>'button small'])!!}
</div>
