<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekening extends Model
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
        return $this->belongsTo(staff::class);
    }
}
