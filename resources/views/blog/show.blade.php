@extends('layouts.app')
@section('title', $post->title . ' — KMS')
@section('meta_description', $post->excerpt)
@section('content')

<article class="section section--tight">
  <div class="container">
    <p class="breadcrumb"><a href="{{ route('blog.index') }}">Blog</a> / {{ $post->title }}</p>
    <h1 style="font-size:clamp(1.8rem,3.4vw,2.6rem);max-width:760px;">{{ $post->title }}</h1>
    <div class="meta-row">
      <span class="badge">{{ $post->category->name ?? 'Article' }}</span>
      <span>{{ $post->published_at->format('d F Y') }}</span>
      <span>{{ $post->reading_time }} min de lecture</span>
    </div>

    @if($post->cover_image)
    <div class="detail-hero__media">
      <img src="{{ Storage::url($post->cover_image) }}" alt="">
    </div>
    @endif

    <div class="prose" style="margin-top:32px;">
      {!! nl2br(e($post->content)) !!}
    </div>
  </div>
</article>

@if($relatedPosts->isNotEmpty())
<section class="section section--alt">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">a-lire-aussi</p>
      <h2 style="font-size:1.5rem;">Articles similaires</h2>
    </div>
    <div class="grid grid--3">
      @foreach($relatedPosts as $p)
      <article class="card post-card">
        <div class="post-card__media">@if($p->cover_image)<img src="{{ Storage::url($p->cover_image) }}" alt="">@endif</div>
        <div class="post-card__body">
          <h3><a href="{{ route('blog.show', $p) }}">{{ $p->title }}</a></h3>
          <p>{{ $p->excerpt }}</p>
        </div>
      </article>
      @endforeach
    </div>
  </div>
</section>
@endif

<div class="container">
  <hr class="divider">
  <div class="btn-row" style="margin-top:0;margin-bottom:60px;">
    <a href="{{ route('blog.index') }}" class="btn btn--ghost">← Retour au blog</a>
    <a href="{{ route('contact.show') }}" class="btn btn--primary">Une question sur cet article ?</a>
  </div>
</div>

@endsection
