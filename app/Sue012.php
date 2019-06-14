<?php

// Modelo SUE012 (Provincias)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue012 extends Model
{
    // $provincias -> Legajos
    public function legajos()
    {
    	return $this->hasMany(Sue001::class,'provin');
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
