@extends('plantillas.principal')

<?php $deptos = array();
      $puesto = array();
      $muni = array();
  foreach ($departamentos as $key => $depto) {
    $deptos[$depto->id_departamento] = mb_strtoupper($depto->nombre_departamento);
  }
  foreach ($puestos as $key => $pt) {
    $puesto[$pt->id_puesto] = mb_strtoupper($pt->nombre_puesto);
  }
  foreach ($municipios as $key => $m) {
    $muni[$m->id_municipio] = mb_strtoupper($m->nombre_municipio);
  }
?>


@section('title')
  <title>Editar Empleado</title>
@endsection

@section('content')
  @section('content')
    @if($errors->has())
      @foreach ($errors->all() as $error)
         <div data-alert class="alert-box alert">
           {{ $error }}
           <a href="#" class="close">&times;</a>
         </div>
     @endforeach
         @endif
  <div class="row">
    <div class="large-12 columns">
      <h1 class="text-center">Editar Empleado</h1>
      <p class="text-info">Nota: Todos los campos con (*) son obligatorios.</p>
    </div>
  </div>

  {!!Form::model($empleado, ['route'=>['empleado.update', $empleado->id_empleado], 'method'=>'PUT', 'data-abide'])!!}

  <div class="row">
    <div class="large-12 columns">
        {!!Form::label('Nombres*',null )!!}
        {!!Form::text('nombres_empleado', null, ['placeholder'=>'Nombres empleado', 'required'=>'required', 'maxlength'=>'50', 'pattern'=>'[a-zA-Z]+'])!!}
        <small class="error">El nombre es requerido, por favor ingrese un nombre valido.</small>
    </div>
  </div>

  <div class="row">
    <div class="large-12 columns">
        {!!Form::label('Apellidos*',null )!!}
        {!!Form::text('apellidos_empleados', null, ['class'=>'form-control', 'placeholder'=>'Apellidos empleado', 'required'=>'required', 'maxlength'=>'50', 'pattern'=>'[a-zA-Z]+'])!!}
        <small class="error">El apellido es requerido, por favor ingrese un apellido valido.</small>
    </div>
  </div>

  <div class="row">
    <div class="large-12 columns">
        {!!Form::label('DPI*',null )!!}
        {!!Form::text('dpi_empleado', null, ['class'=>'form-control', 'placeholder'=>'No dpi del empleado', 'required'=>'required', 'maxlength'=>'13', 'pattern'=>'number'])!!}
        <small class="error">El numero de DPI es requerido y deve ser númerico.</small>
    </div>
  </div>

  <div class="row">
    <div class="large-12 columns">
      {!!Form::label('Genero*',null )!!}
      {!!Form::radio('genero_empleado', 'm', null, ['required'=>'required', 'id'=>'masculino'])!!} {!!Form::label('masculino','Masculino' )!!}
      {!!Form::radio('genero_empleado', 'f', null, ['required'=>'required', 'id'=>'femenino'])!!} {!!Form::label('femenino','Femenino' )!!}
      <small class="error">El genero es requerido.</small>
    </div>
  </div>

  <div class="row">
    <div class="large-12 columns">
        {!!Form::label('Domicilio*',null )!!}
        {!!Form::text('domicilio_empleado', null, ['class'=>'form-control', 'placeholder'=>'Direccion del domicilio del empleado', 'required'=>'required', 'maxlength'=>'50'])!!}
        <small class="error">El domicilio es requerido.</small>
    </div>
  </div>



  <?php
    $zonas = array();
    for ($i=0; $i <= 25; $i++) {
      //array_push($zonas, $i);
      $zonas['zona '.$i] = 'Zona '.$i;
    }
   ?>

   <div class="row">
     <div class="large-12 columns">
        {!!Form::label('Zona residencia*',null)!!}
        {!!Form::select('zona_empleado', $zonas, null, ['placeholder' => 'Seleccionar zona...', 'required'=>'required'])!!}
        <small class="error">La zona es requerido, seleccione una opción valida.</small>
     </div>
   </div>

   <div class="row">
     <div class="large-12 columns">
        {!!Form::label('Telefono*',null )!!}
        {!!Form::text('telefono_empleado', null, ['placeholder'=>'No telefono principal', 'required'=>'required', 'maxlength'=>'8', 'pattern'=>'number'])!!}
        <small class="error">El telefono es requerido y solo debe contener números.</small>
     </div>
   </div>

   <div class="row">
     <div class="large-12 columns">
        {!!Form::label('Telefono de Emergencias',null)!!}
        {!!Form::text('telefono_emergencias_empleado', null, ['placeholder'=>'No telefono de emergencias', 'maxlength'=>'8', 'pattern'=>'number'])!!}
        <small class="error">El número de telefono solo debe contener números.</small>
     </div>
   </div>

   <div class="row">
     <div class="large-12 columns">
         {!!Form::label('Fecha Nacimiento*',null )!!}
         {!!Form::text('fecha_nacimiento_empleado', null, ['class'=>'form-control datepicker', 'placeholder'=>'Fecha de nacimiento', 'required'=>'required', 'pattern'=>'date'])!!}
         <small class="error">La fecha es requerida con el formato año-mes-día.</small>
     </div>
   </div>

   <div class="row">
     <div class="large-12 columns">
         {!!Form::label('Tipo de Sangre',null)!!}
         {!!Form::select('tipo_sangre_empleado', array('a negativo' => 'A Negativo', 'a positivo' => 'A Positivo', 'b negativo' => 'B Negativo', 'b positivo' => 'B Positivo', 'ab negativo' => 'AB Negativo', 'ab positivo' => 'AB Positivo', 'o negativo' => 'O Negativo', 'o positivo' => 'O Positivo',), null, ['placeholder' => 'Selecciona tipo...', 'class'=>'form-control'])!!}
     </div>
   </div>

   <div class="row">
     <div class="large-12 columns">
         {!!Form::label('Antecedentes',null)!!}
         {!!Form::checkbox('antecedentes_empleado', 'true')!!}
         {!!Form::label('antecedentes_empleado','Si')!!}
     </div>
   </div>

   <div class="row">
     <div class="large-12 columns">
         {!!Form::label('Correo*',null)!!}
         {!!Form::email('correo_empleado', null, ['class'=>'form-control', 'placeholder'=>'Direccion de correo electronico', 'required'=>'required', 'pattern'=>'email'])!!}
         <small class="error">El correo es requerido y con un formato valido.</small>
     </div>
   </div>



   <div class="row">
     <div class="large-12 columns">
         {!!Form::label('Departamento residencia*',null)!!}
         {!!Form::select('id_departamento', $deptos, $idDepto, ['placeholder' => 'Selecciona departamento...', 'class'=>'departamento', 'required'=>'required'])!!}
         <small class="error">El departamento es requerido, seleccione una opcion valida.</small>
     </div>
   </div>

   <div class="row">
     <div class="large-12 columns">
         {!!Form::label('Municipio residencia*',null)!!}
         {!!Form::select('id_municipio', $muni, null, ['placeholder' => 'Selecciona municipio...', 'required'=>'required', 'id'=>'municipio'])!!}
         <small class="error">El municipio es requerido, seleccione una opcion valida.</small>
     </div>
   </div>

   <div class="row">
     <div class="large-12 columns">
         {!!Form::label('Puesto*',null)!!}
         {!!Form::select('id_puesto', $puesto, null, ['placeholder' => 'Selecciona puesto...', 'required'=>'required'])!!}
         <small class="error">El puesto es requerido, seleccione una opcion valida.</small>
     </div>
   </div>

   <div class="row">
     <div class="large-12 columns">
       {!!Form::submit('Guardar', ['class'=>'button small'])!!}
     </div>
   </div>
  {!!Form::close()!!}

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



@endsection
