<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public static $createRules = [
        'title' => ['required', 'string', 'min:5', 'max:30'],
        'text' => ['required', 'string', 'min:10', 'max:250'],
        'trainee' => ['required', 'boolean'],
        'profession_id' => ['required','exists:professions,id'],
        'county_id'=>['required','exists:counties,id'],
        'year' => ['required', 'integer', 'digits:4', 'min:2000','max:2025'],
        'remote' => ['boolean', 'nullable'],
        'duration' => ['required', 'integer'],
        'durationType'=>['required','integer','min:0','max:3'],
        'company' => ['required', 'string'],
    ];

    public static $updateRules = [
        'text' => ['required', 'string', 'min:10', 'max:250'],
    ];

    protected $fillable = [
        'title',
        'text',
        'user_id',
        'trainee',
        'profession_id',
        'county_id',
        'year',
        'remote',
        'duration',
        'company',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }
}
