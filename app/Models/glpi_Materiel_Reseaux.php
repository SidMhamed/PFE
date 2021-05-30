<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_Materiel_reseaux extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'locations_id',
        'users_id_tech',
        'UsagerNumero',
        'Usager',
        'Utilisateur',
        'groups_id',
        'users_id',
        'states_id',
        'MaterielReseauTypes_id',
        'fabricant_id',
        'MaterielReseauModels_id',
        'numeroDeSerie',
        'NumeroDinventaire',
        'networks_id',
        'comment',

    ];
    public function user()
    {
        $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function groups()
    {
        $this->belongsTo(glpi_groups::class, 'groups_id', 'id');
    }
    public function type()
    {
        $this->belongsTo(glpi_Materiel_ReseauxTypes::class, 'MaterielReseauTypes_id' , 'id');
    }
    public function models()
    {
        $this->belongsTo(glpi_Materiel_ReseauxModele::class, 'MaterielReseauModels_id' , 'id');
    }
    public function location()
    {
        $this->belongsTo(glpi_location::class, 'locations_id' , 'id');
    }
    public function fabricant()
    {
        $this->belongsTo(glpi_fabricant::class, 'fabricant_id' , 'id');
    }
    public function Reseaux()
    {
        $this->belongsTo(glpi_reseaux::class, 'networks_id' , 'id');
    }
}
