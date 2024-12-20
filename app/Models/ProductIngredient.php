<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIngredient extends Model
{
    /** @use HasFactory<\Database\Factories\ProductIngredientFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'ingredient_id'
    ];
}
