<?php

// Modelo SUE086 (Grupo Empresa)

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sue086 extends Model
{
    // $grupos -> Legajos
    public function legajos()
    {
    	return $this->hasMany(Sue086::class,'grupo_emp');
    }
}
