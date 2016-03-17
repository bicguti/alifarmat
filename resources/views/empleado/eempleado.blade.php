@extends('plantillas.principal')

<?php $deptos = array();
      $puesto = array();
  foreach ($departamentos as $key => $depto) {
    $deptos[$depto->id_departamento] = mb_strtoupper($depto->nombre_departamento);
  }
  foreach ($puestos as $key => $pt) {
    $puesto[$pt->id_puesto] = mb_strtoupper($pt->nombre_puesto);
  }
?>

@section('title')
  <title>Editar Empleado</title>
@endsection

@section('content')
  @section('content')
    @if($errors->has())
             <div class="alert alert-warning" role="alert">
                @foreach ($errors->all() as $error)
                   <div>{{ $error }}</div>
               @endforeach
             </div>
         @endif </br>
  <h1 class="text-center">Editar Empleado</h1>
  <p class="text-info">Nota: Todos los campos con (*) son obligatorios.</p>
  {!!Form::model($empleado, ['route'=>['empleado.update', $empleado->dpi_empleado], 'method'=>'PUT', 'class'=>'form-horizontal', 'role'=>'form'])!!}
  <div class="form-group">
    {!!Form::label('Nombres*',null ,['class'=>'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
      {!!Form::text('nombres_empleado', null, ['class'=>'form-control', 'placeholder'=>'Nombres empleado', 'required'=>'required', 'maxlength'=>'50'])!!}
    </div>
  </div>

  <div class="form-group">
    {!!Form::label('Apellidos*',null ,['class'=>'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
      {!!Form::text('apellidos_empleados', null, ['class'=>'form-control', 'placeholder'=>'Apellidos empleado', 'required'=>'required', 'maxlength'=>'50'])!!}
    </div>
  </div>

  <div class="form-group">
    {!!Form::label('DPI*',null ,['class'=>'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
      {!!Form::text('dpi_empleado', null, ['class'=>'form-control', 'placeholder'=>'No dpi del empleado', 'required'=>'required', 'maxlength'=>'13'])!!}
    </div>
  </div>

  <div class="form-group">
    {!!Form::label('Genero*',null ,['class'=>'col-sm-2 control-label'])!!}
    <div class="col-sm-offset-2 col-sm-10">
      <label for="">
          {!!Form::radio('genero_empleado', 'm', null, ['required'=>'required'])!!}
          Masculino
      </label>
      <label for="">
          {!!Form::radio('genero_empleado', 'f', null, ['required'=>'required'])!!}
          Femenino
      </label>
    </div>
  </div>

  <div class="form-group">
    {!!Form::label('Domicilio*',null ,['class'=>'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
      {!!Form::text('domicilio_empleado', null, ['class'=>'form-control', 'placeholder'=>'Direccion del domicilio del empleado', 'required'=>'required', 'maxlength'=>'50'])!!}
    </div>
  </div>

  <?php
    $zonas = array();
    for ($i=0; $i <= 25; $i++) {
      //array_push($zonas, $i);
      $zonas['zona '.$i] = 'Zona '.$i;
    }
   ?>
  <div class="form-group">
    {!!Form::label('Zona residencia*',null ,['class'=>'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
      {!!Form::select('zona_empleado', $zonas, null, ['placeholder' => 'Seleccionar zona...', 'class'=>'form-control', 'required'=>'required'])!!}
    </div>
  </div>

  <div class="form-group">
    {!!Form::label('Telefono*',null ,['class'=>'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
      {!!Form::text('telefono_empleado', null, ['class'=>'form-control', 'placeholder'=>'No telefono principal', 'required'=>'required', 'maxlength'=>'8'])!!}
    </div>
  </div>

  <div class="form-group">
    {!!Form::label('Telefono de Emergencias',null ,['class'=>'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
      {!!Form::text('telefono_emergencias_empleado', null, ['class'=>'form-control', 'placeholder'=>'No telefono de emergencias', 'maxlength'=>'8'])!!}
    </div>
  </div>

  <div class="form-group">
    {!!Form::label('Fecha Nacimiento*',null ,['class'=>'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
      {!!Form::text('fecha_nacimiento_empleado', null, ['class'=>'form-control datepicker', 'placeholder'=>'Fecha de nacimiento', 'required'=>'required'])!!}
    </div>
  </div>

  <div class="form-group">
    {!!Form::label('Tipo de Sangre',null ,['class'=>'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
      {!!Form::select('tipo_sangre_empleado', array('a negativo' => 'A Negativo', 'a positivo' => 'A Positivo', 'b negativo' => 'B Negativo', 'b positivo' => 'B Positivo', 'ab negativo' => 'AB Negativo', 'ab positivo' => 'AB Positivo', 'o negativo' => 'O Negativo', 'o positivo' => 'O Positivo',), null, ['placeholder' => 'Selecciona tipo...', 'class'=>'form-control'])!!}
    </div>
  </div>

  <div class="form-group">
    {!!Form::label('Antecedentes',null ,['class'=>'col-sm-2 control-label'])!!}
    <div class="col-sm-offset-2 col-sm-10">
      <label for="">
          {!!Form::checkbox('antecedentes_empleado', 'true')!!}
          Si
      </label>
    </div>
  </div>

  <div class="form-group">
    {!!Form::label('Correo*',null ,['class'=>'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
      {!!Form::email('correo_empleado', null, ['class'=>'form-control', 'placeholder'=>'Direccion de correo electronico', 'required'=>'required'])!!}
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
      {!!Form::select('id_municipio', array(), null, ['placeholder' => 'Selecciona municipio...', 'class'=>'form-control', 'required'=>'required'])!!}
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
@endsection
