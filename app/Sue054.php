<?php

// Modelo SUE054 (Cuadrillas)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue054 extends Model
{
    protected $fillable = ['codigo','detalle'];	// Saque campo: ,'encargado'  hasta tener el combo de legajos

    protected $guarded = ['id','_token' ]; // every field to protect

    // $cuadrillas -> Legajos
    public function legajos()
    {
    	return $this->hasMany(Sue054::class,'cuadrilla');
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
