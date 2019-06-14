<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mdl015 extends Model
{
    // Validaciones
	public static $messages = [
		'detalle.required'=>'El nombre es obligatorio',
		'detalle.min'=>'El nombre debe tener al menos 3 caracteres.'
		];

	public static $rules = [
		'detalle'=>'required|min:3',
		'detalle'=>'max:200'
		];

	protected $fillable = ['detalle','comenta','dias','total','ocult_dias'];

	protected $guarded = ['id','_token' ]; // every field to protect
}
