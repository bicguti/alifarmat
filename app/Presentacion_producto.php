<?php

namespace Alifarmat;

use Illuminate\Database\Eloquent\Model;
use DB;
class Presentacion_producto extends Model
{
  protected $table = 'PRESENTACION_PRODUCTO';
  protected $fillable = ['id_presentacion_producto', 'nombre_presentacion_producto'];
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
  public static function setPresProducto($idProducto, $nombre, $cantidad, $precio)
  {
    return DB::select('CALL nuevo_pres_producto(?, ?, ?, ?, ?)', array($idProducto, $nombre, $cantidad, $precio, TRUE));
  }
  /**
    * metodo que busca a una presentación de producto para editar
    * @param $id, identificador unico de cada registro
  */
  public static function findPresProducto($id)
  {
    return PRESENTACION_PRODUCTO::where('id_presentacion_producto', $id)->first();
  }

  /**
    *metodo para actulizar los datos de una Presentacion de producto
    *@param $nombre, nombre de la presentación de producto
    *@param $id, identificadro unico del registro
  */
  public static function updatePresProducto($idProducto, $nombre, $cantidad, $precio, $id)
  {
    return DB::select('CALL actualizar_pres_producto(?, ?, ?, ?, ?)', array($idProducto, $nombre, $cantidad, $precio, $id));
  }
}
