<?php
$productos =    array();
foreach ($producto as $key => $value) {
  $productos[$value->id_producto] = ucwords($value->nombre_producto);
}
 ?>
<div class="large-12 columns">
  {!!Form::label('producto', 'Producto*')!!}
  {!!Form::select('id_producto', $productos, null, ['placeholder'=>'Seleccione producto', 'required'])!!}
  <small class="error">El producto es requerido, por favor seleccione un producto.</small>
</div>

<div class="large-12 columns">
  {!!Form::label('Nombre*', null)!!}
  {!!Form::text('nombre_presentacion_producto', null, ['placeholder'=>'Nombres de presentación de producto', 'required'=>'required', 'maxlength'=>'50', 'pattern'=>'[a-zA-Z]+'])!!}
  <small class="error">El nombre es requerido, por favor ingrese un nombre valido.</small>
</div>

<div class="large-12 columns">
  {!!Form::label('Cantidad unidades*', null)!!}
  {!!Form::text('cantidad_unidades', null, ['placeholder'=>'Cantidad de unidades por presentación de producto', 'required'=>'required', 'pattern'=>'^[0-9]+$'])!!}
  <small class="error">El nombre es requerido, por favor ingrese un nombre valido.</small>
</div>

<div class="large-12 columns">
  {!!Form::label('precio_publico', 'Precio al Publico*')!!}
  <div class="row collapse">
      <div class="small-3 large-2 columns">
        <span class="prefix">Q. </span>
      </div>
      <div class="small-9 large-10 columns">

  {!!Form::text('precio_publico', null, ['placeholder'=>'Precio de venta de la presentación del producto e.j. 14.90', 'required'=>'required', 'pattern'=>'^[0-9]+(\.[0-9]{2})*$'])!!}
  <small class="error">El formato de precio no es valido, tiene que ser numerico e.j. 14.90 ó 14.</small>
</div>
</div>
</div>

<div class="large-12 columns">
  {!!Form::submit('Guardar', ['class'=>'button small'])!!}
</div>
