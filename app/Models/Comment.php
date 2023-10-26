<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    public static $createRules=[
        'text'=>['required', 'max:250'],
        'post_id'=>['required'],
    ];

    public static $updateRules=[
        'text'=>['required', 'max:250']
    ];

    protected $fillable=[
        "text",
        "user_id",
        "post_id"
    ];

    public function scopeByPost(Builder $query, int $id): void{
        $query->where('post_id',$id);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
