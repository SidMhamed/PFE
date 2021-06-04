<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_groups extends Model
{
    use HasFactory;
    protected $fillable =[
        'entities_id',
        'name',
        'comment',
        'is_itemgroup',
        'is_usergroup'
    ];
}
