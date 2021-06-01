<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComposatsCarteSIM extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'comment',
        // 'entities_id',
        'is_recursive',
        'fabricant_id',
        'voltage',
        'devicesimcardtypes_id',
        'allow_voip',
    ];
}
