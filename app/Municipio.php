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

    //metodo que busca el id_departamento donde el id_municipio sea el parametro
    public static function findDepto($id)
    {
      return MUNICIPIO::where('id_municipio', $id)->first();
    }
}
