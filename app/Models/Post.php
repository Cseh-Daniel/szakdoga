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
        'trainee'=>['required','boolean'],
        'profession'=>['required','string'],
        'year'=>['required','integer','digits:4'],
        'remote'=>['boolean','nullable'],
        'duration'=>['required','string','max:10'],
        'company'=>['required','string'],
    ];
    public static $updateRules=[
        'text' => ['required','string', 'min:10', 'max:250'],
    ];

    protected $fillable=[
        'title',
        'text',
        'user_id',
        'trainee',
        'profession',
        'year',
        'remote',
        'duration',
        'company',
    ];

public function user(){
    return $this->belongsTo(User::class);
}

}
