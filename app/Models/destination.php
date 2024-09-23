<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class destination extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'kantor_cabang_id',
    ];

    // protected $guarded = [];

    public function kantor_cabang()
    {
        return $this->belongsTo(kantor_cabang::class);
    }

    public function destination()
    {
        return $this->hasMany(destination::class);
    }
    
    public function transaction()
    {
        return $this->hasMany(transaction::class);
    }

    public function detail_transaction()
    {
        return $this->hasMany(detail_transaction::class);
    }
}
