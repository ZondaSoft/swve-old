<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue075 extends Model
{
    protected $guarded = ['_token' ]; // every field to protect

    public function scopeName($query, $name)
    {
        // dd("scope :" . $name);

        if ($name != "")
        {
          //$query->where('detalle', "LIKE" , "%$name%");
          $query->where(\DB::raw("CONCAT(id,' ', detalle)"), "LIKE" , "%$name%");
        }
    }
}
