<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function blogPost()
    {
        return $this->hasMany(BlogPost::class);
    }
}
