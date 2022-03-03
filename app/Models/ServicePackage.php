<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePackage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }

    public function service_package_features()
    {
        return $this->hasMany(ServicePackageFeature::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
