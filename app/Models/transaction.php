<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'kantor_cabang_id',
        'user_id',
        'category_bus_id',
        'bus_id',
        'destination_id',
        'code',
        'total_price',
        'extra_charge',
        'transaction_status',
        'departure_date',
        'return_date',
        'pickup_time',
        'longitude',
        'latitude',
    ];

    public function kantorCabang()
    {
        return $this->belongsTo(KantorCabang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function detailTransaction()
    {
        return $this->hasMany(DetailTransaction::class);
    }
}
