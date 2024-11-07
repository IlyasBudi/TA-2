<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'admin_id',
        'user_id',
        'kantor_cabang_id',
        'destination_id',
        'category_bus_id',
        'bus_id',
        'code',
        // 'destination',
        'total_price',
        'extra_charge',
        'departure_date',
        'return_date',
        'pickup_time',
        'longitude',
        'latitude',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kantorCabang()
    {
        return $this->belongsTo(KantorCabang::class);
    }

    public function categoryBus()
    {
        return $this->belongsTo(CategoryBus::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
