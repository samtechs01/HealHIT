<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideEffect extends Model
{
    /** @use HasFactory<\Database\Factories\SideEffectFactory> */
    use HasFactory;

    protected $fillable = [
        'ingredient_id',
        'description'
    ];
}
