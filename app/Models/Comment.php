<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'comment_by',//equiv to related user_id
        'comment_to',//equiv to related user_id
        'content'
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
