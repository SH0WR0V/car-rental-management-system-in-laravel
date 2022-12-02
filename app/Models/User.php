<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdminApproval;
use App\Models\Approval;
use App\Models\RentHistory;
use App\Models\CarService;
use App\Models\BlockUser;

class User extends Model
{
    use HasFactory;
    public function histories()
    {
        return $this->belongsTo(RentHistory::class);
    }
    public function userapproval()
    {
        return $this->belongsTo(Approval::class);
    }
    public function useradminapproval()
    {
        return $this->belongsTo(AdminApproval::class);
    }
    public function usercarservices()
    {
        return $this->belongsTo(CarService::class);
    }
    public function blockusers()
    {
        return $this->belongsTo(BlockUser::class);
    }
}
