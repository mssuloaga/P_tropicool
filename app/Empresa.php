<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 *
 * @property $id
 * @property $nombre
 * @property $logo
 * @property $direccion
 * @property $telefono
 * @property $mision
 * @property $vision
 * @property $descripcion
 * @property $instagram
 * @property $facebook
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria[] $categorias
 * @property Evento[] $eventos
 * @property Trabajadore[] $trabajadores
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empresa extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','logo','direccion','telefono','mision','vision','descripcion','instagram','facebook'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categorias()
    {
        return $this->hasMany('App\Categoria', 'id_empresas', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventos()
    {
        return $this->hasMany('App\Evento', 'id_empresas', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trabajadores()
    {
        return $this->hasMany('App\Trabajadore', 'id_empresas', 'id');
    }
    

}
