<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_MaterielBureau extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'color',
        'matricule',
        'users_id',
        'location_id',
        'states_id',
        'fabricant_id',
        'comment',

    ];
}
