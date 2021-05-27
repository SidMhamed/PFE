<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_Imprimante extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        // 'contact',
        // 'contact_num',
        'users_id_tech',
        'groups_id_tech',
        'serial',
        'otherserial',
        'have_serial',
        'have_parallel',
        'have_usb',
        'have_wifi',
        'have_ethernet',
        'comment',
        'memory_size',
        'locations_id',
        'networks_id',
        'printertype_id',
        'printermodels_id',
        'manufacturers_id',
    //     'is_global',
    //     'is_deleted',
    //     'is_template',
    //    'template_name',
        'init_pages_couter',
        'last_pages_counter',
        'users_id',
        'groups_id',
        'states',
        // 'ticket_tco',
        // 'is_dynamic',
    ];
}
