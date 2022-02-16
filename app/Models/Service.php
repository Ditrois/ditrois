<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
    
    public function service_features()
    {
        return $this->hasMany(ServiceFeature::class);
    }
    
    public function pricings()
    {
        return $this->hasMany(Pricing::class);
    }
    
    public function themes()
    {
        return $this->hasMany(Theme::class);
    }
    
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
