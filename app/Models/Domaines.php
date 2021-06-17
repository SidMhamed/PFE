<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaines extends Model
{
    use HasFactory;
    protected $fillable = [
       'name',
        'domaintypes_id',
        'date_creation',
        'date_expiration',
        'tech',
        'others',
        'comment',
    ];
}
