<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public static $createRules=[
        'title' => ['required','string', 'min:5', 'max:30'],
            'text' => ['required','string', 'min:10', 'max:250'],
    ];
    public static $updateRules=[
                    'text' => ['required','string', 'min:10', 'max:250'],

    ];

    protected $fillable=[
        'title',
        'text',
        'user_id',
    ];

public function user(){
    return $this->belongsTo(User::class);
}

}
