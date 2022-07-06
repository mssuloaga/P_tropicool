<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    use HasFactory;

    static $rules=[
        'title'=>'required',
        'descripcion'=>'required',
        'star'=>'required',
        'end'=>'required',
    ];

    protected $fillable=['title', 'description','star','end'];
}
