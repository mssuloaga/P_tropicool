<?php

namespace App\Models;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'id_producto',
    ];

    public function productos(){
        return $this->belongsTo(Producto::class);
    }
}
