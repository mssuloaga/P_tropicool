<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $precio
 * @property $cantidad
 * @property $imagen
 * @property $created_at
 * @property $updated_at
 * @property $id_categorias
 *
 * @property Categoria $categoria
 * @property Stock[] $stocks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'precio' => 'required',
		'cantidad' => 'required',
		'id_categorias' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','precio','cantidad','imagen','id_categorias'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Categoria', 'id', 'id_categorias');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stocks()
    {
        return $this->hasMany('App\Stock', 'id_productos', 'id');
    }
    

}
