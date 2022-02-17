<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    
    public function wedding_people()
    {
        return $this->hasMany(WeddingPerson::class);
    }
    
    public function wedding_galleries()
    {
        return $this->hasMany(WeddingGallery::class);
    }
    
    public function wedding_donations()
    {
        return $this->hasMany(WeddingDonation::class);
    }
    
    public function wedding_respons()
    {
        return $this->hasMany(WeddingRespon::class);
    }
}
