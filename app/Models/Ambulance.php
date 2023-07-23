<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ambulance extends Model
{
    use HasFactory;
    protected $table = "ambulances";
    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    protected static function ambulanceType()
    {
        return [
             'AC'
            ,'Non-AC'
            ,'Fridger'
            ,'Corpse Carrier'
        ];
    }

}
