<?php

// Modelo FZA002 (Bancos)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fza002 extends Model
{
    protected $guarded = ['id','_token' ]; // every field to protect


    // $bancos -> Legajos
    public function legajos()
    {
    	return $this->hasMany(Sue001::class,'banco');
    }


    public function scopeName($query, $name)
    {
        // dd("scope :" . $name);

        if ($name != "")
        {
          //$query->where('detalle', "LIKE" , "%$name%");
          $query->where(\DB::raw("CONCAT(codigo,' ', detalle)"), "LIKE" , "%$name%");
        }
    }
}
