<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pricing()
    {
        return $this->belongsTo(Pricing::class);
    }
}
