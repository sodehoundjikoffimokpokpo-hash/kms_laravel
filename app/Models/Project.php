<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'technologies',
        'image',
        'demo_url',
        'source_url',
        'is_featured',
        'order',
        'created_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'created_at' => 'date',
    ];

    public function getTechnologyListAttribute()
    {
        return array_map('trim', explode(',', $this->technologies));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
