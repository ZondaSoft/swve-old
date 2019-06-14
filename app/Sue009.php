<?php

// Modelo SUE009 (Obras sociales)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue009 extends Model
{

 	  protected $guarded = ['id','_token' ]; // every field to protect


 	  // $obrasocial -> Legajos
    public function legajos()
    {
    	return $this->hasMany(Sue009::class,'cod_obsoc');
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
