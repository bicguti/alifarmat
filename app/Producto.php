<?php

namespace Alifarmat;

use Illuminate\Database\Eloquent\Model;
use DB;
class Producto extends Model
{
    protected $table = 'PRODUCTO';

    /*
      metodo para obtener todos los productos almacenados en la base de datos
      */
    public static function getAll()
    {
      return PRODUCTO::get();
    }
    public static function setProducto($nombre, $cantidad, $tamano, $descripcion, $idproveedor)
    {
      return DB::select('call nuevo_producto(?,?,?,?,?)', array($nombre, $cantidad, $tamano, $descripcion, $idproveedor));
    }
    /*
        Metodo para obtener un listado de todos los productos
    */
    public static function obtenerListadoProductos()
    {
      return PRODUCTO::join('PROVEEDOR', 'PRODUCTO.id_proveedor', '=', 'PROVEEDOR.id_proveedor')
                      ->join('PRESENTACION_PRODUCTO', 'PRODUCTO.id_presentacion_producto', '=', 'PRESENTACION_PRODUCTO.id_presentacion_producto')
                      ->select('PRODUCTO.nombre_producto', 'PRODUCTO.cantidad_en_inventario', 'PRESENTACION_PRODUCTO.nombre_presentacion_producto', 'PROVEEDOR.nombre_proveedor')
                      ->get();
    }

    /*
        metodo para obtener los datos de un producto buscado por medio de su id
    */
    public static function findProducto($id)
    {
      return PRODUCTO::where('id_producto', $id)->first();
    }

    /*
        metodo para actulizar los datos de un producto
    */
    public static function updateProducto($nombre, $cantidad, $tamano, $descripcion, $idproveedor, $id)
    {
      return DB::select('call editar_producto(?, ?, ?, ?, ?, ?)', array($nombre, $cantidad, $tamano, $descripcion, $idproveedor, $id));
    }
}
