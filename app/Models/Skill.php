<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'level',
        'order',
    ];

    protected $casts = [
        'level' => 'integer',
        'order' => 'integer',
    ];

    public $timestamps = false;

    const CATEGORIES = [
        'language' => 'Langage de programmation',
        'framework' => 'Framework / Outil',
        'os' => 'Système d\'exploitation',
        'office' => 'Bureautique',
        'pro' => 'Compétence professionnelle',
        'soft' => 'Savoir-être',
    ];

    public function getCategoryLabelAttribute()
    {
        return self::CATEGORIES[$this->category] ?? $this->category;
    }

    public static function byCategory()
    {
        $result = [];
        foreach (self::CATEGORIES as $key => $label) {
            $result[$label] = self::where('category', $key)->orderBy('order')->get();
        }
        return $result;
    }
}
