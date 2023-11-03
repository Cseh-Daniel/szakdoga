<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public static $createRules = [
        'title' => ['required', 'string', 'min:5', 'max:60'],
        'text' => ['required', 'string', 'min:10', 'max:3000'],
        'trainee' => ['required', 'boolean'],
        'profession_id' => ['required', 'exists:professions,id'],
        'county_id' => ['required', 'exists:counties,id'],
        'year' => ['required', 'integer', 'digits:4', 'min:2000', 'max:2025'],
        'remote' => ['boolean', 'nullable'],
        'duration' => ['required', 'integer'],
        'durationType' => ['required', 'integer', 'min:0', 'max:3'],
        'company' => ['required', 'string'],
    ];

    public static $updateRules = [
        'text' => ['required', 'string', 'min:10', 'max:3000'],
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

    protected $hidden = [
        'user_id',
    ];

    // public function scopeByColId(Builder $query, string $col, int $id): void
    // {
    //     //for County and Profession cuz they are the same
    //     $query->where($col, $id);
    // }

    public function scopeByCounty(Builder $query, int $id): void
    {
        $query->where('county_id', $id);
    }

    public function scopeByProfession(Builder $query, int $id): void
    {
        $query->where('profession_id', $id);
    }

    public function scopeByJobType(Builder $query, ?Bool $type): void
    {
        $query->where('trainee', $type);
    }

    public function scopeByRemote(Builder $query, ?Bool $type): void
    {
        // $type = ($type == false || $type == null) ? 'false OR null' : true;
        if ($type) {
            $query->where('remote', true);
        } else {
            $query->where('remote', false)->orWhereNull('remote');
        }
    }

    public function scopeByYear(Builder $query, ?int $yearMin = null, ?int $yearMax = null): void
    {
        if ($yearMin != null && $yearMax != null) {
            $years = [$yearMin, $yearMax];
            $years = ($years[0] > $years[1]) ? array_reverse($years) : $years;
            $query->whereBetween('year', $years);

        } else if ($yearMin != null) {
            $query->where('year', '>=', $yearMin);

        } else if ($yearMax != null) {
            $query->where('year', '<=', $yearMax);
        }
    }




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
