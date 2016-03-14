<?php

namespace Alifarmat;

use Illuminate\Database\Eloquent\Model;
use DB;
class PUESTO extends Model
{
    protected $table = 'PUESTO';
    public $timestamps = false;
    protected $fillable = ['nombre_puesto', 'estado_puesto'];

   public static function setPuesto($nombre)
    {
      return DB::select('call nuevo_puesto(?, ?)', array($nombre, TRUE));
    }

    public static function findPuesto($id)
    {
      //return DB::table('PUESTO')->find($id);
      return DB::table('PUESTO')->where('id_puesto',$id)->first();
    }

    public static function updatePuesto($id, $nombre)
    {
      return DB::select('call actualizar_puesto(?, ?)', array($id, $nombre));
    }
}
