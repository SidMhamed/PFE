<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_contacts extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'firstname',
        'phone',
        'phone2',
        'mobile',
        'fax',
        'email',
        'comment',
        'address',
        'postcode',
        'town',
        'state',
        'country',

    ];
}
