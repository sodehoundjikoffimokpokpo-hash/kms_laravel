@extends('layouts.app')
@section('title', 'Projets — KMS')
@section('content')

<section class="section section--tight">
  <div class="container">
    <p class="eyebrow">projets</p>
    <h1 style="font-size:clamp(1.8rem,3.4vw,2.6rem);">Mes projets</h1>
    <p class="prose">
      Une sélection de réalisations personnelles et académiques. Ce portfolio est géré depuis l'administration : chaque nouveau projet ajouté apparaît automatiquement ici.
    </p>
  </div>
</section>

<section class="section" style="padding-top:0;">
  <div class="container">
    <div class="grid grid--3">
      @forelse($projects as $project)
      <article class="card project-card">
        <div class="project-card__media">
          @if($project->image)
            <img src="{{ Storage::url($project->image) }}" alt="Capture d'écran du projet {{ $project->title }}">
          @else
            <span class="project-card__initials">{{ substr($project->title, 0, 2) }}</span>
          @endif
        </div>
        <div class="project-card__body">
          <h3><a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a></h3>
          <p>{{ $project->short_description }}</p>
          <ul class="tag-list">
            @foreach($project->technology_list as $tech)<li class="tag">{{ $tech }}</li>@endforeach
          </ul>
          <div class="card-links">
            <a href="{{ route('projects.show', $project) }}">Détails →</a>
            @if($project->demo_url)<a href="{{ $project->demo_url }}" target="_blank" rel="noopener">Démo ↗</a>@endif
          </div>
        </div>
      </article>
      @empty
      <div class="empty-state" style="grid-column: 1/-1;">
        $ ls ./projets<br>Aucun projet pour l'instant — cette page se remplira au fur et à mesure.
      </div>
      @endforelse
    </div>
  </div>
</section>

@endsection
