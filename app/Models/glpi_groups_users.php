<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class glpi_groups_users extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'groups_id'
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function group()
    {
        $this->belongsTo(glpi_groups::class,'groups_id', 'id');
    }

}
