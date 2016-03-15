<?php

namespace Alifarmat;

use Illuminate\Database\Eloquent\Model;
use DB;
class Municipio extends Model
{
    protected $table = "MUNICIPIO";
    public $timestamps = false;

    /*
      metodo encargado de obtener todos los municipios
      de un departamento en especifico
    */
    public static function findMunicipios($idDepto)
    {
      return  MUNICIPIO::where('id_departamento', $idDepto)->get();
      //return User::whereRaw('age > ? and votes = 100', [25])->get();
    }
}
