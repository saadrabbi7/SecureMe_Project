<?php

namespace App\Models;

use App\Models\Profile;
use App\Models\Location;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     * 
     * 
     */

    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'blood_group'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * ========================
     *      Relations
     * ========================
     */
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }
}
