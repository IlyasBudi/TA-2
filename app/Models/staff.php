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
}
