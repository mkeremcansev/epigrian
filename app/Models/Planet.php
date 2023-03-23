<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    /**
     * @var bool $timestamps
     */
    public $timestamps = false;

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'climate',
        'created',
        'diameter',
        'edited',
        'gravity',
        'name',
        'orbital_period',
        'population',
        'rotation_period',
        'surface_water',
        'terrain'
    ];

    /**
     * @var string[] $casts
     */
    protected $casts = [
        'created' => 'datetime',
        'edited' => 'datetime'
    ];
}
