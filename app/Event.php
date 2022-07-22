<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 *
 * @property $id
 * @property $title
 * @property $start
 * @property $end
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Event extends Model
{
    
    static $rules = [
		'title' => 'required',
		'start' => 'required',
		'end' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','start','end'];



}
