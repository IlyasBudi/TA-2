<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'name',
        'bank_number',
        'staff_id',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    // public function pencairans()
    // {
    //     return $this->hasMany(Pencairan::class);
    // }
}
