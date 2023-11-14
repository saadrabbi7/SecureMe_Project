<?php

namespace App\Models;

use App\Models\User;
use App\Models\PoliceStation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $table = "profiles";
    protected $guarded = [];
    /**
     * ===========================
     *      Relations
     * ===========================
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function policestation()
    {
        return $this->hasOne(PoliceStation::class, 'location_id', 'location_id');
    }
}
