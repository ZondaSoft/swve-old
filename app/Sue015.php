<?php

// Modelo SUE015 (Sindicato)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue015 extends Model
{
    // $sindicato -> Legajos
    public function legajos()
    {
    	return $this->hasMany(Sue015::class,'cod_sindic');
    }


    public function scopeName($query, $name)
  	{
  		// dd("scope :" . $name);

  		if ($name != "")
  		{
  			//$query->where('detalle', "LIKE" , "%$name%");
  			$query->where(\DB::raw("CONCAT(codigo,' ', detalle)"), "LIKE" , "%$name%");

  			//dd($query);
  		}
  	}
}
