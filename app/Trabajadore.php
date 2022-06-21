<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Trabajadore
 *
 * @property $id
 * @property $imagen
 * @property $rut_trabajador
 * @property $nombre
 * @property $direccion
 * @property $telefono
 * @property $email
 * @property $fecha_ingreso
 * @property $sueldo
 * @property $cargo
 * @property $created_at
 * @property $updated_at
 * @property $id_empresas
 *
 * @property Empresa $empresa
 * @property Evento[] $eventos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Trabajadore extends Model
{
    
    static $rules = [
		'imagen' => 'required',
		'rut_trabajador' => 'required',
		'nombre' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'email' => 'required',
		'fecha_ingreso' => 'required',
		'sueldo' => 'required',
		'cargo' => 'required',
		'id_empresas' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['imagen','rut_trabajador','nombre','direccion','telefono','email','fecha_ingreso','sueldo','cargo','id_empresas'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Empresa', 'id', 'id_empresas');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventos()
    {
        return $this->hasMany('App\Evento', 'id_trabajador', 'id');
    }
    

}
