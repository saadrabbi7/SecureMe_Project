<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PictureRecord extends Model
{
    use HasFactory;
    protected $table = "picture_records";
    protected $guarded = [];
}
