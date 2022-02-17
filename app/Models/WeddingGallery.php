<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingGallery extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
