<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_Telephone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'statut_id',
        'locations_id',
        'telephonetypes_id',
        'fabricant_id',
        'telephonemodels_id',
        'groups_id',
        'UsagerNumero',
        'Usager',
        'NumeroDeSerie',
        'users_id',
        'TypeDeGestion',
        'Marque',
        'Alimantation_id',
        'Nombrelignes',
        'Casque',
        'Hautparleur',
    ];
}
