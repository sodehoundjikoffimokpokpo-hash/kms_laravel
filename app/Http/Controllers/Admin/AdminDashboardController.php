<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Post;
use App\Models\ContactMessage;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projectCount = Project::count();
        $postCount = Post::count();
        $messageCount = ContactMessage::where('is_read', false)->count();
        $recentMessages = ContactMessage::orderByDesc('created_at')->limit(5)->get();

        return view('admin.dashboard', compact('projectCount', 'postCount', 'messageCount', 'recentMessages'));
    }
}
