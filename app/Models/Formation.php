<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'title',
        'institution',
        'location',
        'description',
        'order',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(function ($query) {
            $query->orderBy('order')->orderByDesc('year');
        });
    }
}
