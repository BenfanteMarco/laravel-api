<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Technology;

class Post extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name',
        'type_id',
        'cover_image',
        'description',
        'repository_link',
        'slug',
    ];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
