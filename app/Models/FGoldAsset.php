<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FGoldAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'karat_id', 'status',
    ];

    public function karat()
    {
        return $this->belongsTo(FKarat::class, 'karat_id');
    }
}
