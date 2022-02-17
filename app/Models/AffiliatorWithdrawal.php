<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliatorWithdrawal extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function affiliator()
    {
        return $this->belongsTo(Affiliator::class, 'id_affiliator');
    }
}
