<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_type_License extends Model
{
    use HasFactory;
    protected $fillable =[
'name',
'comment',


    ];
}
