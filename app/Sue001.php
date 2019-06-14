<?php

// Modelo SUE001 (Legajos activos)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue001 extends Model
{
	// Validaciones
	public static $messages = [
		'detalle.required'=>'El nombre es obligatorio',
		'detalle.min'=>'El nombre debe tener al menos 3 caracteres.'
		];

	public static $rules = [
		'detalle'=>'required|min:3',
		'detalle'=>'max:200'
		];

	protected $fillable = ['detalle','nombres','fecha_naci','alta','locali'];

	protected $guarded = ['id','_token' ]; // every field to protect

	// $legajos -> Sectores
	public function sector()
	{
		return $this->belongsTo(Sue011::Class,'codsector' , 'codigo');
	}


	// $legajos -> Centros de costo
	public function ccosto()
	{
		return $this->belongsTo(Sue030::Class,'provin');
	}


	// $legajos -> Provincias
	public function provincia()
	{
		return $this->belongsTo(Sue012::Class,'provin');
	}

	// $legajos -> Tipos/modalidad de contrataciones
	public function modalidades()
	{
		return $this->belongsTo(Sue107::Class,'mod_cto');
	}


	// $legajos -> Tipos/modalidad de contrataciones
	public function bancos()
	{
		return $this->belongsTo(Fza002::Class,'banco');
	}


	// $legajos -> convenios colectivos
	public function convenios()
	{
		return $this->belongsTo(Sue007::Class,'convenio');
	}


	// $category->products
  public function products()
  {
  	return $this->belongsTo(Sue028::class);
  }


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
