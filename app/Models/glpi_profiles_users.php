<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_profiles_users extends Model
{
    use HasFactory;

    protected $fillable = [
        'profiles_id'

    ];

    public function profile()
    {
        $this->belongsTo(glpi_profile::class, 'profiles_id', 'id');
    }

}
