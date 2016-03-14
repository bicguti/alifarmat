<?php

namespace Alifarmat;

use Illuminate\Database\Eloquent\Model;

use DB;
class Departamento extends Model
{
    protected $table = 'DEPARTAMENTO';

    public static function getAll()
    {
      return DB::table('DEPARTAMENTO')->get();
    }
}
