<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Post;

class HomeController extends Controller
{
    public function home()
    {
        $formations = Formation::all();
        $skills = Skill::where('category', 'language')
            ->orWhere('category', 'framework')
            ->orderBy('category')
            ->orderBy('order')
            ->limit(8)
            ->get();
        $projects = Project::where('is_featured', true)->orderBy('order')->limit(3)->get();
        if ($projects->isEmpty()) {
            $projects = Project::orderBy('order')->limit(3)->get();
        }
        $posts = Post::where('published', true)->orderByDesc('published_at')->limit(3)->get();

        return view('home', compact('formations', 'skills', 'projects', 'posts'));
    }

    public function about()
    {
        $formations = Formation::orderBy('order')->orderByDesc('year')->get();
        $skillsByCategory = Skill::byCategory();

        return view('about', compact('formations', 'skillsByCategory'));
    }
}
