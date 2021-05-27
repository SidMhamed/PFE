<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImprimanteModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'Comment',
        'product_Numbre',
    ];
}
