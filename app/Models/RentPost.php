<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class RentPost extends Model
{
    use HasFactory;

    public function RentPostUser(){
        return $this -> hasMany(User::class);
    }
}
