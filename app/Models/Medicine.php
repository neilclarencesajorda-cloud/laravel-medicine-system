<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'user_id',
        'medicine_name',
        'category',
        'quantity',
        'expiration_date'
    ];
}