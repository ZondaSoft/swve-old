<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veh001 extends Model
{
    // Scope usado en las busquedas
    public function scopeName($query, $name)
    {
      // dd("scope :" . $name);

      if ($name != "")
      {
        $query->where(\DB::raw("CONCAT(codigo,' ', detalle , ' ' , nombres)"), "LIKE" , "%$name%");

        //dd($query);
      }
    }

    public static function findByNameOrEmail($term)
    {
        //return static::select('detalle','domici','cuil','funcion','codigo')
        //    ->where('codigo', 'LIKE', "%$term%")
        //    ->orWhere('detalle', 'LIKE', "%$term%")
        //    ->get();

        return static::select(\DB::raw("CONCAT(detalle,' ',nombres)  AS detalle"),'domici','cuil','funcion',\DB::raw("CONCAT(codigo)"))
            ->where(\DB::raw("CONCAT(codigo, ' ' ,detalle,' ', nombres)"), "LIKE" , "%$term%")
            ->get();
    }
}
