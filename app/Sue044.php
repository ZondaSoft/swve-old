<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue044 extends Model
{

    protected $guarded = ['id','_token' ]; // every field to protect

    protected $rules = [
    'fecha' => 'date_format:Y-m-d|required|unique:sue044s'];


    public function scopeName($query, $name)
  	{
  		// dd("scope :" . $name);

  		if ($name != "")
  		{
  			//$query->where('detalle', "LIKE" , "%$name%");
        $query->where(\DB::raw("CONCAT(fecha,' ', detalle)"), "LIKE" , "%$name%");
  		}
  	}
}
