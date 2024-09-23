<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
    ];

    public function kantor_cabang()
    {
        return $this->hasOne(kantor_cabang::class);
    }

    public function rekening()
    {
        return $this->hasOne(rekening::class);
    }
}
