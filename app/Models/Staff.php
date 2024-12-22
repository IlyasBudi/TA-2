<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;

class Staff extends Model
{
    use HasFactory, Notifiable, CanResetPassword;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    public function kantorCabang()
    {
        return $this->hasOne(KantorCabang::class);
    }

    public function rekening()
    {
        return $this->hasOne(Rekening::class);
    }

    public function pencairan()
    {
        return $this->hasMany(Pencairan::class);
    }
}
