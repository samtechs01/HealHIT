<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Methodology extends Model
{
    /** @use HasFactory<\Database\Factories\MethodologyFactory> */
    use HasFactory;

    /**
     * The Methodology is a table containing steps with
     *  id; product_id; step_no; step_name; step_description
     *
     * 
     */
    protected $fillable=[
        'product_id',
        'step_no',
        'step_name',
        'step_description',
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
