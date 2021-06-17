<?php

namespace App\Models;

use App\Models\glpi_suppliertypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_suppliers extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'suppliertypes_id',
        'address',
        'phonenumber',
        'website',
        'fax',
        'postcode',
        'email',
        'town',
        'state',
        'country',
        'comment',
        'is_active',

    ];

    public function type()
    {

        $this->belongsTo(glpi_suppliertypes::class, 'suppliertypes_id', 'id');
    }

}
