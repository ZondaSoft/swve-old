<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue058 extends Model
{
  protected $fillable = ['codigo','detalle'];

  protected $guarded = ['id','_token' ]; // every field to protect


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
