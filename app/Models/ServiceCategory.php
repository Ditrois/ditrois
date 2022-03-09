<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function parent() {
        return $this->belongsToOne(static::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(static::class, 'parent_id')->orderBy('id', 'asc');
    }
}
