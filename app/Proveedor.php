<?php

namespace Alifarmat;

use Illuminate\Database\Eloquent\Model;
use DB;
class Proveedor extends Model
{
    protected $table = 'PROVEEDOR';

    /*
      metodo para obtener a todos los proveedores almacenados en la base de datos
    */
    public static function getAll()
    {
      return PROVEEDOR::get();
    }

    /*
      metodo para agregar un nuevo registro a la base de datos
    */
    public static function setProveedor($nombre, $domicilio, $zona, $tel1, $tel2, $representante, $municipio)
    {
      return DB::select('CALL nuevo_proveedor(?, ?, ?, ?, ?, ?, ?, ?)',
              array($nombre, $domicilio, $zona, $tel1, $tel2, $representante, TRUE, $municipio));
    }

    /*
        metodo que obtiene los datos de un proveedor
    */
    public static function findProveedor($id)
    {
      return PROVEEDOR::where('id_proveedor', $id)->first();
    }
}
