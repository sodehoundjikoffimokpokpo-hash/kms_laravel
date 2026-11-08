<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::orderBy('order')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'short_description' => 'required|string|max:220',
            'description' => 'required|string',
            'technologies' => 'required|string|max:250',
            'demo_url' => 'nullable|url',
            'source_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'order' => 'integer|min:0',
            'created_at' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
        ]);

        $slug = Str::slug($validated['title']);
        $count = Project::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }
        $validated['slug'] = $slug;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('message', 'Projet créé avec succès.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'short_description' => 'required|string|max:220',
            'description' => 'required|string',
            'technologies' => 'required|string|max:250',
            'demo_url' => 'nullable|url',
            'source_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'order' => 'integer|min:0',
            'created_at' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('message', 'Projet mis à jour avec succès.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            \Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('message', 'Projet supprimé avec succès.');
    }
}
