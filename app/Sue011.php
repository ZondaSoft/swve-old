<?php

// Modelo SUE011 (Sectores)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue011 extends Model
{
    // $sectores -> Legajos
    public function legajos()
    {
    	return $this->hasMany(Sue001::class,'codsector');
    }


    public function scopeName($query, $name)
  	{
  		// dd("scope :" . $name);

  		if ($name != "")
  		{
  			$query->where(\DB::raw("CONCAT(codigo,' ', detalle)"), "LIKE" , "%$name%");

  			//dd($query);
  		}
  	}
}
