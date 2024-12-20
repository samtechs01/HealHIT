<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class ProductProposal extends Model
{
    /** @use HasFactory<\Database\Factories\ProductProposalFactory> */
    use HasFactory, Notifiable, HasRoles;
 
    protected $fillable = [
        'supervisor_id',
        'student_id',
        'project_name',
        'proposal_form',
        'is_validated',
    ];


    public function product():HasOne
    {
        return $this->hasOne(Product::class);
    }

    public function supervisor():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function student():BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
