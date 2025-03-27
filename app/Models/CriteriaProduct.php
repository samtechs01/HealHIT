<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CriteriaProduct extends Model
{
    /** @use HasFactory<\Database\Factories\CriteriaProductFactory> */
    use HasFactory;

    // Specify the table name
    protected $table = 'criteria_product';
    
    protected $fillable=[
        'product_id',
        'criteria_id',
        'criteria_val'
    ];

   public function criteria():BelongsTo
   {
    return $this->belongsTo(Criteria::class);
   }
}
