<?php

// Modelo SUE006 (Categorias)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue006 extends Model
{

    protected $guarded = ['id','_token' ]; // every field to protect

    // $categorias -> Legajos
    public function legajos()
    {
    	return $this->hasMany(Sue006::class,'cod_categ');
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
