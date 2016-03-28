<?php

namespace Alifarmat;

use Illuminate\Database\Eloquent\Model;
use DB;
class Presproducto extends Model
{
  //  protected $table = 'PRESENTACION_PRODUCTO';
  //  protected $table = 'EMPLEADO';
    /*
      metodo que obiene todas las presentaciones de producto
    */
    public static function getAll()
    {
      return  DB::table('PRESENTACION_PRODUCTO')->get();
    }

    /*
    *  metodo para agregar un nuevo registro a la base de datos
    *  $nombre, es el nombre que tendra la presentacion de producto
    */
    public static function setPresProducto($nombre)
    {
      return DB::select('CALL nuevo_pres_producto(?, ?)', array($nombre, TRUE));
    }

    
}
