<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FCustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'number', 'address', 'parent_name', 'number_two', 'status',
    ];


}
