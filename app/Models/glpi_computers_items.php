<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\glpi_computers;

class glpi_computers_items extends Model
{
    use HasFactory;
    protected $fillable =[
        'computers_id'
    ];

    public function computer()
    {
        $this->belongsTo(glpi_computers::class, 'computers_id', 'id');
    }
}
