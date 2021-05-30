<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_Peripherique extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'statut_id',
        'locations_id',
        'Peripheriquetypes_id',
        'users_id_tech',
        'fabricant_id',
        'groups_tech',
        'Peripheriquemodels_id',
        'groups_id',
        'UsagerNumero',
        'Usager',
        'NumeroDeSerie',
        'Utilisateur',
        'users_id',
        'TypeDeGestion',
        'Marque',
        'comment',
    ];
}
