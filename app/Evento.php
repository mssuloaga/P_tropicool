<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Evento
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 *
 * @property Calendario[] $calendarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Evento extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','direccion','precio','fecha_inicio','fecha_termino'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calendarios()
    {
        return $this->hasMany('App\Calendario', 'id_eventos', 'id');
    }
    

}
