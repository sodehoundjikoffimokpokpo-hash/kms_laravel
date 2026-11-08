@extends('layouts.app')
@section('title', 'Blog — KMS')
@section('content')

<section class="section section--tight">
  <div class="container">
    <p class="eyebrow">blog</p>
    <h1 style="font-size:clamp(1.8rem,3.4vw,2.6rem);">Le blog</h1>
    <p class="prose">
      Notes de veille technologique, retours d'expérience et avancées sur mes projets de développement web et mobile.
    </p>

    @if($categories->isNotEmpty())
    <div class="filter-row">
      <a href="{{ route('blog.index') }}" class="filter-chip @if(!$activeCategory) is-active @endif">Tous</a>
      @foreach($categories as $category)
      <a href="{{ route('blog.category', $category) }}" class="filter-chip @if($activeCategory && $activeCategory->id === $category->id) is-active @endif">{{ $category->name }}</a>
      @endforeach
    </div>
    @endif
  </div>
</section>

<section class="section" style="padding-top:0;">
  <div class="container">
    <div class="grid grid--3">
      @forelse($posts as $post)
      <article class="card post-card">
        <div class="post-card__media">
          @if($post->cover_image)<img src="{{ Storage::url($post->cover_image) }}" alt="">@endif
        </div>
        <div class="post-card__body">
          <div class="post-card__meta">
            <span class="badge">{{ $post->category->name ?? 'Article' }}</span>
            <span>{{ $post->published_at->format('d M Y') }}</span>
            <span>{{ $post->reading_time }} min de lecture</span>
          </div>
          <h3><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h3>
          <p>{{ $post->excerpt }}</p>
          <a class="post-card__link" href="{{ route('blog.show', $post) }}">Lire l'article →</a>
        </div>
      </article>
      @empty
      <div class="empty-state" style="grid-column: 1/-1;">
        $ ls ./articles<br>Aucun article publié pour le moment. Revenez bientôt !
      </div>
      @endforelse
    </div>

    @if($posts->lastPage() > 1)
    <div class="pagination">
      @if($posts->onFirstPage())
        <span class="is-current">Page {{ $posts->currentPage() }} / {{ $posts->lastPage() }}</span>
      @else
        <a href="{{ $posts->previousPageUrl() }}@if($activeCategory)?categorie={{ $activeCategory->slug }}@endif">← Précédent</a>
        <span class="is-current">Page {{ $posts->currentPage() }} / {{ $posts->lastPage() }}</span>
      @endif
      @if($posts->hasMorePages())
        <a href="{{ $posts->nextPageUrl() }}@if($activeCategory)?categorie={{ $activeCategory->slug }}@endif">Suivant →</a>
      @endif
    </div>
    @endif
  </div>
</section>

@endsection
