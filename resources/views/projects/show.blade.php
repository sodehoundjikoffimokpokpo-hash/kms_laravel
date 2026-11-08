@extends('layouts.app')
@section('title', $project->title . ' — KMS')
@section('meta_description', $project->short_description)
@section('content')

<section class="section section--tight">
  <div class="container">
    <p class="breadcrumb"><a href="{{ route('projects.index') }}">Projets</a> / {{ $project->title }}</p>
    <h1 style="font-size:clamp(1.8rem,3.4vw,2.6rem);">{{ $project->title }}</h1>
    <p class="prose" style="font-size:1.08rem;">{{ $project->short_description }}</p>

    <div class="detail-hero__media">
      @if($project->image)
        <img src="{{ Storage::url($project->image) }}" alt="Capture d'écran du projet {{ $project->title }}">
      @else
        <span class="detail-hero__initials">{{ substr($project->title, 0, 2) }}</span>
      @endif
    </div>

    <div class="grid grid--2" style="align-items:start;">
      <div class="prose">
        {!! nl2br(e($project->description)) !!}
      </div>
      <div class="contact-card">
        <div class="contact-card__item">
          <span class="contact-card__label">Technologies</span>
          <ul class="tag-list">
            @foreach($project->technology_list as $tech)<li class="tag">{{ $tech }}</li>@endforeach
          </ul>
        </div>
        @if($project->created_at)
        <div class="contact-card__item">
          <span class="contact-card__label">Réalisé en</span>
          <span class="contact-card__value">{{ $project->created_at->format('F Y') }}</span>
        </div>
        @endif
        @if($project->demo_url || $project->source_url)
        <div class="contact-card__item">
          <span class="contact-card__label">Liens</span>
          <div class="btn-row" style="margin-top:8px;">
            @if($project->demo_url)<a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="btn btn--primary">Voir la démo</a>@endif
            @if($project->source_url)<a href="{{ $project->source_url }}" target="_blank" rel="noopener" class="btn btn--ghost">Code source</a>@endif
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</section>

@if($otherProjects->isNotEmpty())
<section class="section section--alt">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">a-voir-aussi</p>
      <h2 style="font-size:1.5rem;">Autres projets</h2>
    </div>
    <div class="grid grid--3">
      @foreach($otherProjects as $p)
      <article class="card project-card">
        <div class="project-card__media">
          @if($p->image)<img src="{{ Storage::url($p->image) }}" alt="">@else<span class="project-card__initials">{{ substr($p->title, 0, 2) }}</span>@endif
        </div>
        <div class="project-card__body">
          <h3><a href="{{ route('projects.show', $p) }}">{{ $p->title }}</a></h3>
          <p>{{ $p->short_description }}</p>
        </div>
      </article>
      @endforeach
    </div>
  </div>
</section>
@endif

@endsection
