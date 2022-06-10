<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Trabajadore
 *
 * @property $id
 * @property $imagen
 * @property $rut_usuario
 * @property $nombre
 * @property $direccion
 * @property $telefono
 * @property $email
 * @property $fecha_ingreso
 * @property $fecha_salida
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
		'rut_usuario' => 'required',
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
    protected $fillable = ['imagen','rut_usuario','nombre','direccion','telefono','email','fecha_ingreso','fecha_salida','sueldo','cargo','id_empresas'];


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
    

    public function empresas()
    {
      return $this->hasOne('App\Empresa','id','id_empresas');
    }

}
