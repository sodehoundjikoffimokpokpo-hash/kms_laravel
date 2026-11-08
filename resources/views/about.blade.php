@extends('layouts.app')

@section('title', 'À propos — KMS')

@section('content')

<section class="section section--tight">
  <div class="container">
    <p class="eyebrow">about</p>
    <h1 style="font-size:clamp(1.8rem,3.4vw,2.6rem);">À propos de moi</h1>
    <p class="prose" style="font-size:1.08rem;">
      Je m'appelle <strong>SODEHOUNDJI Koffi Mokpokpo</strong>, né le 20/06/2003 et basé à Lomé, Togo. Je suis actuellement étudiant en première année de Génie Informatique, option développement des applications à l'IAEC, et je me forme aussi bien au développement web et mobile qu'à l'électronique analogique et numérique. En dehors des cours, j'occupe le poste de responsable sportif au sein du Bureau des Étudiants — une expérience qui nourrit mon goût pour le travail d'équipe et la gestion de projets.
    </p>
  </div>
</section>

<section class="section section--alt">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">parcours</p>
      <h2>Formation</h2>
    </div>
    <div class="timeline" style="max-width:680px;">
      @forelse($formations as $formation)
      <div class="timeline-item">
        <span class="timeline-item__year">{{ $formation->year }}</span>
        <h3>{{ $formation->title }}</h3>
        <p class="timeline-item__org">{{ $formation->institution }}@if($formation->location) — {{ $formation->location }}@endif</p>
        @if($formation->description)<p>{{ $formation->description }}</p>@endif
      </div>
      @empty
      <p class="empty-state">Le parcours sera bientôt complété.</p>
      @endforelse
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">competences</p>
      <h2>Compétences</h2>
      <p>Du langage de programmation aux compétences professionnelles, voici ma boîte à outils complète.</p>
    </div>

    <div class="grid grid--2">
      @forelse($skillsByCategory as $label => $skills)
      <div class="skill-group">
        <p class="skill-group__title">{{ $label }}</p>
        @foreach($skills as $skill)
        <div class="skill">
          <span class="skill__name">{{ $skill->name }}</span>
          <span class="skill__track"><span class="skill__fill" data-level="{{ $skill->level }}"></span></span>
          <span class="skill__value">{{ $skill->level }}%</span>
        </div>
        @endforeach
      </div>
      @empty
      <p class="empty-state">Les compétences seront affichées ici dès qu'elles seront ajoutées.</p>
      @endforelse
    </div>
  </div>
</section>

<section class="section section--alt">
  <div class="container">
    <div class="grid grid--2">
      <div>
        <div class="section-head" style="margin-bottom:24px;">
          <p class="eyebrow">langues</p>
          <h2 style="font-size:1.5rem;">Connaissances linguistiques</h2>
        </div>
        <div class="lang-bar">
          <div class="lang-bar__head"><strong>Français</strong><span>Très bien</span></div>
          <span class="skill__track"><span class="skill__fill" data-level="95" style="display:block;"></span></span>
        </div>
        <div class="lang-bar">
          <div class="lang-bar__head"><strong>Anglais</strong><span>Bien</span></div>
          <span class="skill__track"><span class="skill__fill" data-level="75" style="display:block;"></span></span>
        </div>
      </div>

      <div>
        <div class="section-head" style="margin-bottom:24px;">
          <p class="eyebrow">loisirs</p>
          <h2 style="font-size:1.5rem;">Loisirs &amp; engagements</h2>
        </div>
        <div class="chip-row" style="margin-bottom:18px;">
          <span class="chip">⚽ Football</span>
          <span class="chip">🏀 Basketball</span>
          <span class="chip">🎬 Cinéma</span>
        </div>
        <p>Responsable sportif au sein du Bureau des Étudiants de l'IAEC — une fonction qui complète mon parcours académique par une expérience concrète de leadership et de travail d'équipe.</p>
      </div>
    </div>
  </div>
</section>

<section class="section--tight">
  <div class="container">
    <div class="cta-banner">
      <div>
        <h2>Envie de collaborer ?</h2>
        <p>Je suis ouvert aux stages, projets étudiants et collaborations techniques.</p>
      </div>
      <a href="{{ route('contact.show') }}" class="btn btn--primary">Me contacter</a>
    </div>
  </div>
</section>

@endsection
