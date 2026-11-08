<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::with('category')->orderByDesc('created_at')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'category_id' => 'nullable|exists:categories,id',
            'excerpt' => 'required|string|max:300',
            'content' => 'required|string',
            'published' => 'boolean',
            'published_at' => 'date',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $slug = Str::slug($validated['title']);
        $count = Post::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }
        $validated['slug'] = $slug;

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('blog', 'public');
        }

        Post::create($validated);

        return redirect()->route('admin.posts.index')
            ->with('message', 'Article créé avec succès.');
    }

    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'category_id' => 'nullable|exists:categories,id',
            'excerpt' => 'required|string|max:300',
            'content' => 'required|string',
            'published' => 'boolean',
            'published_at' => 'date',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('blog', 'public');
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')
            ->with('message', 'Article mis à jour avec succès.');
    }

    public function destroy(Post $post)
    {
        if ($post->cover_image) {
            \Storage::disk('public')->delete($post->cover_image);
        }
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('message', 'Article supprimé avec succès.');
    }
}
