<?php $deptos = array();
      $puesto = array();
  foreach ($departamentos as $key => $depto) {
    $deptos[$depto->id_departamento] = mb_strtoupper($depto->nombre_departamento);
  }
  foreach ($puestos as $key => $pt) {
    $puesto[$pt->id_puesto] = mb_strtoupper($pt->nombre_puesto);
  }
?>


@extends('plantillas.principal')

@section('title')
  <title>Nuevo Empleado</title>
@stop

@section('content')
  <h1 class="text-center">Nuevo Empleado</h1>
  <p class="text-info">Nota: Todos los campos con (*) son obligatorios</p>
  {!!Form::open(['route'=>'empleado.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!}
    <div class="form-group">
      {!!Form::label('Nombres*',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-10">
        {!!Form::text('nombre_empleado', null, ['class'=>'form-control', 'placeholder'=>'nombres empleado'])!!}
      </div>
    </div>

    <div class="form-group">
      {!!Form::label('Apellidos*',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-10">
        {!!Form::text('apellidos_empleado', null, ['class'=>'form-control', 'placeholder'=>'nombres empleado'])!!}
      </div>
    </div>

    <div class="form-group">
      {!!Form::label('Genero*',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-offset-2 col-sm-10">
        <label for="">
            {!!Form::radio('genero_empleado', '1')!!}
            Masculino
        </label>
        <label for="">
            {!!Form::radio('genero_empleado', '2')!!}
            Femenino
        </label>
      </div>
    </div>

    <div class="form-group">
      {!!Form::label('Domicilio*',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-10">
        {!!Form::text('domicilio_empleado', null, ['class'=>'form-control', 'placeholder'=>'nombres empleado'])!!}
      </div>
    </div>

    <?php
      $zonas = array();
      for ($i=1; $i <= 25; $i++) {
        //array_push($zonas, $i);
        $zonas[$i] = $i;
      }
     ?>
    <div class="form-group">
      {!!Form::label('Zona residencia*',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-10">
        {!!Form::select('zona_empleado', $zonas, null, ['placeholder' => 'Seleccionar zona...', 'class'=>'form-control'])!!}
      </div>
    </div>

    <div class="form-group">
      {!!Form::label('Telefono*',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-10">
        {!!Form::text('telefono_empleado', null, ['class'=>'form-control', 'placeholder'=>'nombres empleado'])!!}
      </div>
    </div>

    <div class="form-group">
      {!!Form::label('Telefono de Emergencias',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-10">
        {!!Form::text('telefono_emergencias_empleado', null, ['class'=>'form-control', 'placeholder'=>'nombres empleado'])!!}
      </div>
    </div>

    <div class="form-group">
      {!!Form::label('Fecha Nacimiento*',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-10">
        {!!Form::text('fecha_nacimiento_empleado', null, ['class'=>'form-control datepicker', 'placeholder'=>'fecha de nacimiento'])!!}
      </div>
    </div>

    <div class="form-group">
      {!!Form::label('Tipo de Sangre',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-10">
        {!!Form::select('size', array('a negativo' => 'A Negativo', 'a positivo' => 'A Positivo', 'b negativo' => 'B Negativo', 'b positivo' => 'B Positivo', 'ab negativo' => 'AB Negativo', 'ab positivo' => 'AB Positivo', 'o negativo' => 'O Negativo', 'o positivo' => 'O Positivo',), null, ['placeholder' => 'Selecciona tipo...', 'class'=>'form-control'])!!}
      </div>
    </div>

    <div class="form-group">
      {!!Form::label('Antecedentes',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-offset-2 col-sm-10">
        <label for="">
            {!!Form::checkbox('antecedentes_empleado', '1')!!}
            Si
        </label>
      </div>
    </div>

    <div class="form-group">
      {!!Form::label('Correo*',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-10">
        {!!Form::email('correo_empleado', null, ['class'=>'form-control', 'placeholder'=>'direccion de correo'])!!}
      </div>
    </div>

    <div class="form-group">
      {!!Form::label('Departamento residencia*',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-10">
        {!!Form::select('id_departamento', $deptos, null, ['placeholder' => 'Selecciona departamento...', 'class'=>'form-control departamento', 'required'=>'required', 'data-toggle'=>'modal', 'data-target'=>'#myModal'])!!}
      </div>
    </div>

    <div class="form-group">
      {!!Form::label('Municipio residencia*',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-10" id="municipio">
        {!!Form::select('id_municipio', array(), null, ['placeholder' => 'Selecciona municipio...', 'class'=>'form-control'])!!}
      </div>
    </div>

    <div class="form-group">
      {!!Form::label('Puesto*',null ,['class'=>'col-sm-2 control-label'])!!}
      <div class="col-sm-10">
        {!!Form::select('id_puesto', $puesto, null, ['placeholder' => 'Selecciona puesto...', 'class'=>'form-control', 'required'=>'required'])!!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {!!Form::submit('Guardar', ['class'=>'btn btn-primary'])!!}
      </div>
    </div>
  {!!Form::close()!!}

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" >
    <div class="modal-content content-cargando">
      <div class="modal-header header-cargando">
  <!--      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h1 class="modal-title text-center" id="myModalLabel"><strong style="color:orange">Cargando...</strong></h1>
      </div>
      <div class="modal-body">

        <div class="main_body">
<!--          <div class="element">
              <div class="loading1">
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
              </div>
          </div>-->
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
    <!--      <div class="element">
              <div class="loading3">
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
              </div>
          </div>
        </div>-->

      </div>
<!--      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

@endsection
