<?php

// // Modelo SUE094 (Horarios fijos)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue094 extends Model
{
    // $hfijos -> Legajos
    public function legajos()
    {
    	return $this->hasMany(Sue001::class,'cod_horar');
    }
}
