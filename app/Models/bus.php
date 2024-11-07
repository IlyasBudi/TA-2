<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'status',
        'kantor_cabang_id',
        'category_bus_id',
    ];

    public function kantorCabang()
    {
        return $this->belongsTo(KantorCabang::class);
    }

    public function categoryBus()
    {
        return $this->belongsTo(CategoryBus::class);
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
