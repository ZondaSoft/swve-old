<?php

// Modelo SUE007 (Convenios Colectivos)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue007 extends Model
{


		protected $guarded = ['id','_token' ]; // every field to protect


    // $convenios -> Legajos
    public function legajos()
    {
    	return $this->hasMany(Sue001::class,'convenio');
    }


    // $convenios -> categorias
    public function categorias()
    {
    	return $this->hasMany(Sue006::class,'cod_conve');
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
