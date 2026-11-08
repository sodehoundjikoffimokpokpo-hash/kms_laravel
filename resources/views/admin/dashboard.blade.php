@extends('layouts.app')
@section('title', 'Dashboard Admin — KMS')
@section('content')

<section class="section section--tight">
  <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 48px;">
      <div>
        <p class="eyebrow">admin</p>
        <h1 style="font-size:1.8rem;">Tableau de bord</h1>
      </div>
      <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
        @csrf
        <button type="submit" class="btn btn--ghost">Déconnexion</button>
      </form>
    </div>

    <div class="grid grid--3" style="margin-bottom: 48px;">
      <div class="card">
        <p class="eyebrow">projets</p>
        <p style="font-size: 2.2rem; font-weight: 700; margin: 0; color: var(--accent-green);">{{ $projectCount }}</p>
        <p style="margin: 8px 0 0; font-size: 0.95rem;">Projets en total</p>
        <a href="{{ route('admin.projects.index') }}" class="btn btn--ghost" style="margin-top: 14px; font-size: 0.85rem;">Gérer →</a>
      </div>
      <div class="card">
        <p class="eyebrow">articles</p>
        <p style="font-size: 2.2rem; font-weight: 700; margin: 0; color: var(--accent-amber);">{{ $postCount }}</p>
        <p style="margin: 8px 0 0; font-size: 0.95rem;">Articles publiés</p>
        <a href="{{ route('admin.posts.index') }}" class="btn btn--ghost" style="margin-top: 14px; font-size: 0.85rem;">Gérer →</a>
      </div>
      <div class="card">
        <p class="eyebrow">messages</p>
        <p style="font-size: 2.2rem; font-weight: 700; margin: 0; color: var(--accent-red);">{{ $messageCount }}</p>
        <p style="margin: 8px 0 0; font-size: 0.95rem;">Non lus</p>
        <a href="{{ route('admin.messages.index') }}" class="btn btn--ghost" style="margin-top: 14px; font-size: 0.85rem;">Voir →</a>
      </div>
    </div>

    <div class="contact-card" style="max-width: 640px;">
      <p class="eyebrow">messages-recents</p>
      <h2 style="font-size: 1.3rem; margin-bottom: 18px;">Derniers messages</h2>
      <div style="max-height: 300px; overflow-y: auto;">
        @forelse($recentMessages as $msg)
        <div style="padding-bottom: 12px; border-bottom: 1px solid var(--border-subtle); margin-bottom: 12px;">
          <p style="margin: 0 0 4px; font-weight: 600; color: var(--text-primary);">{{ $msg->name }}</p>
          <p style="margin: 0 0 4px; font-size: 0.85rem; color: var(--text-muted);">{{ $msg->email }} · {{ $msg->created_at->diffForHumans() }}</p>
          <p style="margin: 0; font-size: 0.95rem; color: var(--text-secondary);">{{ Str::limit($msg->message, 80) }}</p>
        </div>
        @empty
        <p style="color: var(--text-muted); font-style: italic;">Aucun message pour le moment.</p>
        @endforelse
      </div>
    </div>
  </div>
</section>

@endsection
