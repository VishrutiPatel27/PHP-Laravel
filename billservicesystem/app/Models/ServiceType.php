<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class,'services_user','user_id','service_id');
    }
}
