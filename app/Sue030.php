<?php

// Modelo SUE030 (Centros de costo)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue030 extends Model
{
	protected $fillable = ['codigo','detalle','responsa','domicilio','localidad'];

	protected $guarded = ['id','_token' ]; // every field to protect


	// $centros de cotso -> Legajos
	public function legajos()
  {
		return $this->hasMany(Sue001::class,'cod_centro');
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
