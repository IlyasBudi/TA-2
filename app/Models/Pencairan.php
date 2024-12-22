<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencairan extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'staff_id',
        'kantor_cabang_id',
        'rekening_id',
        'status',
        'image',
        'total',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function kantorCabang()
    {
        return $this->belongsTo(KantorCabang::class);
    }

    public function rekening()
    {
        return $this->belongsTo(Rekening::class);
    }
}
