<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'bus_id',
        'destination_id',
        'total_price',
        // 'remaining_payment',
        // 'transaction_status',
        // 'departure_date',
        // 'return_date',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
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
