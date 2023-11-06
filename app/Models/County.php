<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    protected $visible = [
        'id',
        'name',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
