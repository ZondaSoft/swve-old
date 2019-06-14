<?php

// Modelo SUE014 (Jerarquias)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue014 extends Model
{
	// $Jerarquia -> Legajos
    public function legajos()
    {
    	return $this->hasMany(Sue001::class,'cod_jerarq');
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
