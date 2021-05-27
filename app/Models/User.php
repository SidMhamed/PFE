<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\glpi_profile;
use App\Models\glpi_groups;
use App\Models\glpi_location;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'groups_id',
        'locations_id',
        // 'profiles_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function profile()
    // {
    //     $this->belongsTo(glpi_profile::class, 'profiles_id', 'id');
    // }
    public function groups()
    {
        $this->belongsTo(glpi_groups::class, 'groups_id', 'id');
    }
    public function location()
    {
        $this->belongsTo(glpi_location::class, 'locations_id', 'id');
    }
}
