<?php

namespace Alifarmat;

use Illuminate\Database\Eloquent\Model;
use DB;

class Empleado extends Model
{
    protected $table = 'EMPLEADO';

    //metodo para registrar un nuevo empleado en la base de datos
    public static function setEmpleado($nombre, $apellidos, $genero, $domicilio, $zona, $tel1, $tel2, $fechaNacimiento, $edad, $tipoSangre, $antecedentes, $correo, $municipio, $puesto, $dpi)
    {
      return DB::select('CALL nuevo_empleado(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
      array($nombre, $apellidos, $genero, $domicilio, $zona, $tel1, $tel2, $fechaNacimiento, $edad, $tipoSangre, $antecedentes, $correo, $municipio, $puesto, $dpi));
    }

    // metodo para buscar los datos de un empleado
    public static function findEmpleado($id)
    {
      return EMPLEADO::where('id_empleado', $id)->first();
    }
}
