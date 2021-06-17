<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_line extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'caller_num',
        'caller_name',
        'lineoperators_id',
        'users_id',
        'location_id',
        // 'states_id',
        'linetypes_id',
        'comment',
    ];
}
