<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockUser extends Model
{
    public function user()
    {
        return $this->hasMany(User::class,'user_id','id');
    }
}
