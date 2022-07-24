<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'cantidad',
        'precio',
        'imagen',
        'id_categorias',
    ];
    public function images(){
        return $this->hasMany(Image::class);
    }
}
