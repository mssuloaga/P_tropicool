<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Evento
 *
 * @property $id
 * @property $nombre
 * @property $direccion
 * @property $id_trabajador
 * @property $fecha_inicio
 * @property $fecha_termino
 * @property $precio
 * @property $created_at
 * @property $updated_at
 * @property $id_empresas
 *
 * @property Calendario[] $calendarios
 * @property Empresa $empresa
 * @property Trabajadore $trabajadore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Evento extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'direccion' => 'required',
		'id_trabajador' => 'required',
		'fecha_inicio' => 'required',
		'fecha_termino' => 'required',
		'precio' => 'required',
		'id_empresas' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','direccion','id_trabajador','fecha_inicio','fecha_termino','precio','id_empresas'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calendarios()
    {
        return $this->hasMany('App\Calendario', 'id_eventos', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Empresa', 'id', 'id_empresas');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function trabajadore()
    {
        return $this->hasOne('App\Trabajadore', 'id', 'id_trabajador');
    }
    

}
