<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
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
        return $this->belongsTo(admin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kantor_cabang()
    {
        return $this->belongsTo(kantor_cabang::class);
    }

    public function category_bus()
    {
        return $this->belongsTo(category_bus::class);
    }

    public function bus()
    {
        return $this->belongsTo(bus::class);
    }

    public function destination()
    {
        return $this->belongsTo(destination::class);
    }
}
