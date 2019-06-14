<?php

// Modelo SUE107 (Modalidades de contratación)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue107 extends Model
{
    // $Tipos/modalidad de contrataciones -> Legajos

    protected $guarded = ['id','_token' ]; // every field to protect



    public function legajos()
    {
    	return $this->hasMany(Sue001::class,'mod_cto');
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
