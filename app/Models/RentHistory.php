<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CarService;


class RentHistory extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function apprpval()
    {
        return $this->hasMany(CarService::class);
    }
}
