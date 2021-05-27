<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_computermodels extends Model
{
    use HasFactory;
    protected $fillable =[
        'Nom',
        'Numero_du_produit',
        'Poids',
        'Unites_requises',
        'Profondeur',
        'ConnexionDalimentation',
        'Puissance_consommee',
        'DemieLargeur',
        // 'photoface',
        // 'PhotoArriere',
        'comment',
    ];
}
