<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_License extends Model
{
    use HasFactory;
    protected $fillable =[

'name',
'statut_id',
'locations_id',
'softwares_id',
'softwarelicensetypes_id',
'users_id',
'serial',
'number',
'comment',
'expire',



    ];
}
