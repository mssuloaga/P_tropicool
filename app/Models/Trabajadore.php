<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajadore extends Model
{
    use HasFactory;
    protected $table = 'trabajadores';
    protected $fillable = [
        'nombre',
        'rut_trabajador',
        'imagen',
        'direccion',
        'telefono',
        'email',
        'fecha_ingreso',
        'sueldo',
        'cargo',
        'id_empresas',
    ];
}