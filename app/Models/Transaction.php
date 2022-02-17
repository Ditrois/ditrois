<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function affiliator()
    {
        return $this->belongsTo(Affiliator::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
    
    public function weddings()
    {
        return $this->hasOne(Wedding::class);
    }
    
    public function transaction_additionals()
    {
        return $this->hasOne(TransactionAdditional::class);
    }
}
