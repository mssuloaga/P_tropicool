<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Evento
 *
 * @property $id
 * @property $nombre
 * @property $direccion
 * @property $fecha_inicio
 * @property $fecha_termino
 * @property $precio
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Evento extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'direccion' => 'required',
		'fecha_inicio' => 'required',
		'fecha_termino' => 'required',
		'precio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','direccion','fecha_inicio','fecha_termino','precio'];



}
