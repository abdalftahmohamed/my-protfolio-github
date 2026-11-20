<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'category',
        'level',
        'icon',
        'order',
        'visible',
    ];

    protected function casts(): array
    {
        return [
            'level' => 'integer',
            'order' => 'integer',
            'visible' => 'boolean',
        ];
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order')->orderBy('name');
    }

    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('visible', true);
    }
}
