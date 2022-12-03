<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminApproval extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function car()
    {
        return $this->hasMany(CarService::class);
    }
}
