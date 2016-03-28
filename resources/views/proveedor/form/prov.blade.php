<div class="large-12 columns">
  {!!Form::label('Nombre*', null)!!}
  {!!Form::text('nombre_proveedor', null, ['placeholder'=>'Nombre del proveedor', 'required', 'maxlength'=>'50'])!!}
  <small class="error">El campo es requerido.</small>
</div>

<div class="large-12 columns">
  {!!Form::label('Domicilio*', null)!!}
  {!!Form::text('domicilio_proveedor', null, ['placeholder'=>'Domicilio del proveedor', 'required', 'maxlength'=>'20'])!!}
  <small class="error">El campo es requerido.</small>
</div>

<?php
  $zonas = array();
  for ($i=1; $i <= 25; $i++) {
    $zonas['zona '.$i] = 'Zona '.$i;
  }
 ?>

<div class="large-12 columns">
  {!!Form::label('Zona*', null)!!}
  {!!Form::select('zona_proveedor', $zonas, null, ['placeholder'=>'Seleccione zona...', 'required'])!!}
  <small class="error">El campo es requerido, seleccione una opción.</small>
</div>

<?php
  $deptos = array();
  foreach ($departamentos as $depto) {
    $deptos[$depto->id_departamento] = mb_strtoupper($depto->nombre_departamento);
  }
 ?>
<div class="large-12 columns">
  {!!Form::label('Departamento*')!!}
  {!!Form::select('departamento_proveedor', $deptos, null, ['placeholder'=>'Seleccione departamento...', 'required', 'class'=>'departamento'])!!}
  <small class="error">El campo es requerio, seleccione un departamento.</small>
</div>

<div class="large-12 columns">
  {!!Form::label('Municipio*', null)!!}
  {!!Form::select('id_municipio', $municipio = array(), null, ['placeholder'=>'Seleccione municipio...', 'required', 'id'=>'municipio'])!!}
  <small class="error">El campo es requerido, seleccione un municipio.</small>
</div>

<div class="large-12 columns">
  {!!Form::label('Telefono*', null)!!}
  {!!Form::text('telefono_proveedor', null, ['placeholder'=>'No Telefono', 'required', 'maxlength'=>'8', 'pattern'=>'^[0-9]{8}$'])!!}
  <small class="error">El campo es requerido, con 8 digítos.</small>
</div>

<div class="large-12 columns">
  {!!Form::label('Telefono secundario', null)!!}
  {!!Form::text('telefono_secundario_proveedor', null, ['placeholder'=>'No telefono secundario', 'maxlength'=>'8', 'pattern'=>'^[0-9]{8}$'])!!}
  <small class="error">El campo debe contener 8 digítos.</small>
</div>

<div class="large-12 columns">
  {!!Form::label('Representante*', null)!!}
  {!!Form::text('representante_proveedor', null, ['placeholder'=>'Nombre del representante del proveedor', 'required', 'maxlength'=>'100'])!!}
  <small class="error">El campo es requerido.</small>
</div>


<div class="large-12 columns">
  {!!Form::submit('Guardar', ['class'=>'button small'])!!}
</div>

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
