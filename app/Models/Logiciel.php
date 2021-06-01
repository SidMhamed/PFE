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
        // 'locations_id',
        // 'users_id',
        // 'groups_id',
        // 'users_id_tech',
        // 'groups_id_tech',
        'is_update',
        // 'logiciels_id',
        // 'fabricant_id',
        // 'is_deleted',
        // 'is_template',
        'template_name',
        'ticket_tco',
        'is_helpdesk_visible',
        'LogicielCategories_id',
        // 'is_valid',
    ];
}
