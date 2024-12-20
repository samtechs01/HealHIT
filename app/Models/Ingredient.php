<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    /** @use HasFactory<\Database\Factories\IngredientFactory> */
    use HasFactory;
    
    protected $fillable = [
        'name',
        'type',
        'dosage',
        'dosage_uom'
    ];

    public function product():BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
    
}
