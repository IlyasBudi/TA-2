<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KantorCabang extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'address',
        'phone_number',
        // 'location',
        'longitude',
        'latitude',
        'staff_id',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function categoryBus()
    {
        return $this->hasMany(CategoryBus::class);
    }

    public function bus()
    {
        return $this->hasMany(Bus::class);
    }

    public function destination()
    {
        return $this->hasMany(Destination::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
