<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
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
        'cargo_capacity',
        'consumables',
        'cost_in_credits',
        'created',
        'crew',
        'edited',
        'length',
        'manufacturer',
        'max_atmosphering_speed',
        'model',
        'name',
        'passengers',
        'vehicle_class'
    ];

    /**
     * @var string[] $casts
     */
    protected $casts = [
        'created' => 'datetime',
        'edited' => 'datetime'
    ];
}
