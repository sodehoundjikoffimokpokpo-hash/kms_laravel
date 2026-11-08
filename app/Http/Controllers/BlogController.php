<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', true)
            ->orderByDesc('published_at')
            ->paginate(6);
        $categories = Category::orderBy('name')->get();
        $activeCategory = null;

        return view('blog.index', compact('posts', 'categories', 'activeCategory'));
    }

    public function byCategory(Category $category)
    {
        $posts = Post::where('published', true)
            ->where('category_id', $category->id)
            ->orderByDesc('published_at')
            ->paginate(6);
        $categories = Category::orderBy('name')->get();
        $activeCategory = $category;

        return view('blog.index', compact('posts', 'categories', 'activeCategory'));
    }

    public function show(Post $post)
    {
        if (!$post->published && auth()->guest()) {
            abort(404);
        }

        $relatedPosts = collect();
        if ($post->category) {
            $relatedPosts = Post::where('published', true)
                ->where('category_id', $post->category_id)
                ->where('id', '!=', $post->id)
                ->orderByDesc('published_at')
                ->limit(3)
                ->get();
        }

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
