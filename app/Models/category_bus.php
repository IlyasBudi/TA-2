<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        // 'description',
        // 'image',
        'price',
        'kantor_cabang_id',
    ];

    public function kantor_cabang()
    {
        return $this->belongsTo(kantor_cabang::class);
    }

    public function bus()
    {
        return $this->hasMany(bus::class);
    }

    public function booking()
    {
        return $this->hasMany(booking::class);
    }

    public function transaction()
    {
        return $this->hasMany(transaction::class);
    }
}
