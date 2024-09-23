<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bus extends Model
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

    public function kantor_cabang()
    {
        return $this->belongsTo(kantor_cabang::class);
    }

    public function category_bus()
    {
        return $this->belongsTo(category_bus::class);
    }

    public function transaction()
    {
        return $this->hasMany(transaction::class);
    }

    public function detail_transaction()
    {
        return $this->hasMany(detail_transaction::class);
    }

    public function booking()
    {
        return $this->hasMany(booking::class);
    }

    // public function getIsReadyAttribute($value)
    // {
    // return $value ? 'Tersedia' : 'Tidak Tersedia';
    // }
}
