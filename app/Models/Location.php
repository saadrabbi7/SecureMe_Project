<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ambulance;
use App\Models\BloodBank;
use App\Models\PoliceStation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    protected $table = "locations";
    protected $guarded = [];

    /**
     * ===============================
     *      Relations
     * ===============================
     */
    public function ambulances()
    {
        return $this->hasMany(Ambulance::class, 'location_id', 'id');
    }
    public function policeStations()
    {
        return $this->hasMany(PoliceStation::class, 'location_id', 'id');
    }
    public function bloodBanks()
    {
        return $this->hasMany(BloodBank::class, 'location_id', 'id');
    }
}
