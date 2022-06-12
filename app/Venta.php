<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 *
 * @property $id
 * @property $fecha_venta
 * @property $total
 * @property $n_comprobante
 * @property $estado
 * @property $imagen
 * @property $id_usuario
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleVenta[] $detalleVentas
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    
    static $rules = [
		'fecha_venta' => 'required',
		'total' => 'required',
		'n_comprobante' => 'required',
		'estado' => 'required',
		'imagen' => 'required',
		'id_usuario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_venta','total','n_comprobante','estado','imagen','id_usuario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleVentas()
    {
        return $this->hasMany('App\DetalleVenta', 'id_venta', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_usuario');
    }
    

}
