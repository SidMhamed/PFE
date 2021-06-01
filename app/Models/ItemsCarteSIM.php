<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsCarteSIM extends Model
{
    use HasFactory;
    protected $fillable = [
            'items_id',
            'itemstype',
            'devicesimcards_id',
            'is_deleted',
            'is_dynamic',
            'entities_id',
            'is_recursive',
            'serial',
            'otherserial',
            'states_id',
            'locations_id',
            'lines_id',
            'users_id',
            'groups_id',
            'pin',
            'pin2',
            'puk',
            'puk2',
            'msin',
    ];
}

