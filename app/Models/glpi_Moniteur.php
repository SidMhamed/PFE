<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_Moniteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'statut_id',
        'locations_id',
        'Moniteurtypes_id',
        'fabricant_id',
        'Moniteurmodels_id',
        'UsagerNumero',
        'Usager',
        'NumeroDeSerie',
        'users_id',
        'TypeDeGestion',
        'Taille',
        'Microphone',
        'Sub-D',
        'DVI',
        'HDMI',
        'Enceints',
        'BNC',
        'Pivot',
        'DisplayPort',
        'comment',

    ];
}
