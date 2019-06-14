<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue031 extends Model
{
  protected $fillable = ['codigo','detalle','codigo2'];

	protected $guarded = ['id','_token', 'lote' ]; // every field to protect



  public function scopeName($query, $name)
	{
		// dd("scope :" . $name);

		if ($name != "")
		{
			$query->where(\DB::raw("CONCAT(codigo,' ', detalle)"), "LIKE" , "%$name%");

			//dd($query);
		}
	}


  public static function findByNameOrEmail($term)
  {
      //return static::select('detalle','domici','cuil','funcion','codigo')
      //    ->where('codigo', 'LIKE', "%$term%")
      //    ->orWhere('detalle', 'LIKE', "%$term%")
      //    ->get();

      return static::select('detalle','codigo')
          ->where(\DB::raw("CONCAT(codigo, ' ' ,detalle)"), "LIKE" , "%$term%")
          ->get();
  }
}
