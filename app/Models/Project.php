<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        if (! $search) {
            return $query;
        }

        return $query->where(function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        });

    }

    public function scopeSort(Builder $query, ?string $sort, ?string $direction): Builder
    {
        $allowedSorts = [
            'name',
            'created_at',
            'updated_at',
        ];

        $sort = in_array($sort, $allowedSorts)
            ? $sort
            : 'created_at';

        $direction = in_array($direction, ['asc', 'desc'])
            ? $direction
            : 'desc';

        return $query->orderBy($sort, $direction);

    }
}
