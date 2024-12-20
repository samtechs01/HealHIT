<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, Notifiable, HasRoles;
 
    protected $fillable = [ 
        'product_proposal_id',
        'title',
        'description',
        'is_complete',
        'product_src',
        'physical_sample_status',
        'product_category',
        'is_complete',
        'is_validated',
        'to_market',
        'publish_date',
        'expiry_date'
    ];

    public function productProposal():BelongsTo
    {
        return $this->belongsTo(ProductProposal::class, 'product_proposal_id');
    }

    public function ingredients():BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function steps():HasMany
    {
        return $this->hasMany(Methodology::class);
    }
}
