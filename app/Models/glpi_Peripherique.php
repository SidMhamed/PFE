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
        'fabricant_id',
        'Peripheriquemodels_id',
        'UsagerNumero',
        'Usager',
        'NumeroDeSerie',
        'NumeroDenventaire',
        'users_id',
        'TypeDeGestion',
        'Marque',
        'comment',
    ];
}
