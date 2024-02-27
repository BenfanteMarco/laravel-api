<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name',
        'cover_image',
        'description',
        'repository_link',
        'slug',
    ];
}
