<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datoempr extends Model
{
    
    protected $guarded = ['id','_token' ]; // every field to protect
    
}
