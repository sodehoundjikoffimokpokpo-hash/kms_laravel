<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->orderByDesc('created_at')->get();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $otherProjects = Project::where('id', '!=', $project->id)
            ->orderBy('order')
            ->limit(3)
            ->get();

        return view('projects.show', compact('project', 'otherProjects'));
    }
}
