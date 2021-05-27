<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_computerutervirtualmachines extends Model
{
    use HasFactory;

    protected $fillable = [
        'computers_id',
    ];

    public function user()
    {
        $this->belongsTo(glpi_computers::class, 'computers_id', 'id');
    }
}
