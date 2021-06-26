<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logiciel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'comment',
        'locations_id',
        'users_id',
        'is_update',
        'fabricant_id',
        'template_name',
        'LogicielCategories_id',
    ];
}
