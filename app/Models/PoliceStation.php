<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliceStation extends Model
{
    use HasFactory;
    protected $table = "police_stations";
    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
