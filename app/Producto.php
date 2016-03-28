<?php

namespace Alifarmat;

use Illuminate\Database\Eloquent\Model;

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

}
