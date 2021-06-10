<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'filename',
        'filepath',
        'documentcategories_id',
        'mime',
        'Comment',
        'is_deleted',
        'link',
        'users_id',
        'sha1sum',
        'is_blacklisted',
        'tag',
    ];
}
