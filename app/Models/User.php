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
            'fieldlist',
            'phone',
            'phone2',
            'mobile',
            'locations_id',
            'profiles_id',
            'language',
            'use_mode',
            'list_limit',
            'is_active',
            'auths_id',
            'authtype',
            'last_login',
            'date_sync',
            'is_deleted',
            'entities_id',
            'usertitles_id',
            'usercategories_id',
            'csv_delimiter',
            'api_token',
            'api_token_date',
            'cookie_token',
            'cookie_token_date',
            'groups_id',
            'users_id_supervisor',
            'email',
            'email_verified_at',
            'password',

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


    public function profile()
    {
        $this->belongsTo(glpi_profile::class, 'profiles_id', 'id');
    }
    public function groups()
    {
        $this->belongsTo(glpi_groups::class, 'groups_id', 'id');
    }
    public function location()
    {
        $this->belongsTo(glpi_location::class, 'locations_id', 'id');
    }
}
