<?php

// Modelo SUE002 (Familiares)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue002 extends Model
{
    // $familiares -> Legajos
    public function legajos()
    {
    	return $this->hasMany(Sue002::class,'legajo');
    }
}
