<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\glpi_suppliers;

class glpi_suppliertypes extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'Comment',
    ];
    public function supplier()
    {
        $this->belongsTo(glpi_suppliers::class, 'suppliertypes_id', 'id');
    }
}
