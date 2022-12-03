<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Approval;
use App\Models\User;
use App\Models\AdminApproval;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarService extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the CarService
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }
    // public function apprpval()
    // {
    //     return $this->belongsTo(Approval::class);
    // }
    public function adminapprpval()
    {
        return $this->belongsTo(AdminApproval::class);
    }
    public function histories()
    {
        return $this->belongsTo(RentHistory::class);
    }
}
