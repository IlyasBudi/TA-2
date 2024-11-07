<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'kantor_cabang_id',
    ];

    public function kantorCabang()
    {
        return $this->belongsTo(KantorCabang::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function detailTransaction()
    {
        return $this->hasMany(DetailTransaction::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
