<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    use HasFactory;
    protected $table = "blood_banks";
    protected $guarded = [];

    protected static function bloodGroups()
    {
        return [
             'O+'
            ,'O-'
            ,'A+'
            ,'A-'
            ,'B+'
            ,'B-'
            ,'AB+'
            ,'AB-'
        ];
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

}
