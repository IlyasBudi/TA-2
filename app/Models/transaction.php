<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'kantor_cabang_id',
        'user_id',
        'category_bus_id',
        'bus_id',
        'destination_id',
        'destination',
        'total_price',
        'extra_charge',
        'transaction_status',
        'location',
        'departure_date',
        'return_date',
        'down_payment',
        'remaining_payment',
    ];

    public function kantor_cabang()
    {
        return $this->belongsTo(kantor_cabang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function detail_transaction()
    {
        return $this->hasMany(detail_transaction::class);
    }
}
