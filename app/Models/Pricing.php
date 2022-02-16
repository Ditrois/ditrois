<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
    public function pricing_details()
    {
        return $this->hasMany(PricingDetail::class);
    }
}
