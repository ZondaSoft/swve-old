<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sue001;
use App\Sue031;

class Sue028 extends Model
{
    protected $fillable = ['cod_nov', 'comenta1', 'fecha'];


    // $novedades->apynom
    public function empleado()
    {
      return $this->hasMany(Sue001::class, 'codigo' , 'legajo');
    }

    // $product->category
    public function novedad()
    {
      return $this->hasMany(Sue031::class, 'codigo' , 'cod_nov');
    }

    // Accessors
    public function getApynomAttribute()
    {
        if ($this->empleado) {
            if ($this->empleado->first() != null)
              return $this->empleado->first()->detalle . " " . $this->empleado->first()->nombres;
        }

        return 'Empleado no encontrado';
    }


    public function getCodNovNameAttribute()
    {
        if ($this->novedad) {
          if ($this->novedad->first() != null)
            return $this->novedad->first()->detalle;
        }

        return '....';
    }


    public function getNomSectorAttribute()
    {
        if ($this->empleado) {
            if ($this->empleado->first() != null) {
              return $this->empleado->first()->codsector . ' - ' . $this->empleado->first()->sector->detalle;
            }
        }

        return 'Sin sector asignado';
    }
}
