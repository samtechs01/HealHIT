<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Criteria extends Model
{
    /** @use HasFactory<\Database\Factories\CriteriaFactory> */
    use HasFactory;

    protected $fillable=[
        'criterion_no',
        'criterion_description',
    ];

    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
 