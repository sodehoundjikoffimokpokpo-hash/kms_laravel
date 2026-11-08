@extends('layouts.app')

@section('title', 'KMS — Portfolio & Blog')

@section('content')

<section class="hero container">
  <div>
    <span class="hero__kicker">$ ./demarrer-portfolio.sh</span>
    <h1>Je conçois des <span class="hero__accent">applications web &amp; mobiles</span> pensées pour durer.</h1>
    <p class="hero__lead">
      Je suis SODEHOUNDJI Koffi Mokpokpo, étudiant en Génie Informatique, option développement des applications, basé à Lomé.
      J'apprends et je construis : sites web, applications mobiles, et tout ce qui
      se trouve entre le code et l'électronique.
    </p>
    <div class="btn-row">
      <a href="{{ route('projects.index') }}" class="btn btn--primary">Voir mes projets</a>
      <a href="{{ route('contact.show') }}" class="btn btn--ghost">Me contacter</a>
    </div>
    <div class="hero__meta">
      <span>📍 Lomé, Togo</span>
      <span>🎓 Génie Informatique — IAEC</span>
      <span>💼 Disponible pour des projets</span>
    </div>
  </div>

  <div class="terminal" aria-hidden="true">
    <div class="terminal__bar">
      <span class="terminal__dot terminal__dot--red"></span>
      <span class="terminal__dot terminal__dot--amber"></span>
      <span class="terminal__dot terminal__dot--green"></span>
      <span class="terminal__title">koffi@kms — zsh</span>
    </div>
    <div class="terminal__body">
      <div class="terminal__line"><span class="terminal__prompt">$</span> whoami</div>
      <div class="terminal__line"><span class="terminal__val">Koffi Mokpokpo SODEHOUNDJI</span></div>
      <div class="terminal__line"><span class="terminal__prompt">$</span> cat role.txt</div>
      <div class="terminal__line"><span class="terminal__val">Développeur web & mobile | Étudiant IAEC</span></div>
      <div class="terminal__line"><span class="terminal__prompt">$</span> ls ./competences</div>
      <div class="terminal__line">
        @foreach($skills as $skill)<span class="terminal__tag">{{ $skill->name }}</span>@if(!$loop->last)&nbsp;&nbsp;@endif @endforeach
      </div>
      <div class="terminal__line"><span class="terminal__prompt">$</span> echo $STATUS<span class="terminal__cursor"></span></div>
    </div>
  </div>
</section>

<section class="section section--alt">
  <div class="container grid--3 grid">
    <div class="card reveal">
      <h3 style="font-size:1.05rem;">🎓 Formation</h3>
      <p>Génie Informatique, option développement des applications, à l'IAEC de Lomé.</p>
    </div>
    <div class="card reveal">
      <h3 style="font-size:1.05rem;">🛠️ Stack</h3>
      <p>Laravel, Flutter, Symfony, Django — du web au mobile, avec une bonne base en C/C++ et électronique.</p>
    </div>
    <div class="card reveal">
      <h3 style="font-size:1.05rem;">🤝 Leadership</h3>
      <p>Responsable sportif au Bureau des Étudiants de l'IAEC — travail d'équipe et gestion de projets.</p>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head reveal">
      <p class="eyebrow">competences</p>
      <h2>Quelques outils que j'utilise au quotidien</h2>
      <p>Un aperçu de ma stack technique — le détail complet est sur la page À propos.</p>
    </div>

    <div class="reveal" style="max-width:640px;">
      @foreach($skills as $skill)
      <div class="skill">
        <span class="skill__name">{{ $skill->name }}</span>
        <span class="skill__track"><span class="skill__fill" data-level="{{ $skill->level }}"></span></span>
        <span class="skill__value">{{ $skill->level }}%</span>
      </div>
      @endforeach
    </div>

    <div class="btn-row">
      <a href="{{ route('about') }}" class="btn btn--ghost">Voir tout mon profil →</a>
    </div>
  </div>
</section>

<section class="section section--alt">
  <div class="container">
    <div class="section-head reveal">
      <p class="eyebrow">projets</p>
      <h2>Projets en vedette</h2>
      <p>Une sélection de réalisations — toutes ne sont pas encore en ligne, mais le portfolio s'enrichit régulièrement.</p>
    </div>

    <div class="grid grid--3">
      @forelse($projects as $project)
      <article class="card project-card reveal">
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
            @foreach(array_slice($project->technology_list, 0, 3) as $tech)<li class="tag">{{ $tech }}</li>@endforeach
          </ul>
        </div>
      </article>
      @empty
      <div class="empty-state" style="grid-column: 1/-1;">
        Aucun projet publié pour l'instant — les premiers projets seront ajoutés ici très prochainement.
      </div>
      @endforelse
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head reveal">
      <p class="eyebrow">blog</p>
      <h2>Derniers articles</h2>
      <p>Notes de veille technologique et retours d'expérience sur mes projets.</p>
    </div>

    <div class="grid grid--3">
      @forelse($posts as $post)
      <article class="card post-card reveal">
        <div class="post-card__media">
          @if($post->cover_image)<img src="{{ Storage::url($post->cover_image) }}" alt="">@endif
        </div>
        <div class="post-card__body">
          <div class="post-card__meta">
            <span class="badge">{{ $post->category->name ?? 'Article' }}</span>
            <span>{{ $post->published_at }}</span>
          </div>
          <h3><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h3>
          <p>{{ $post->excerpt }}</p>
          <a class="post-card__link" href="{{ route('blog.show', $post) }}">Lire l'article →</a>
        </div>
      </article>
      @empty
      <div class="empty-state" style="grid-column: 1/-1;">
        Aucun article publié pour le moment. Le premier arrive bientôt !
      </div>
      @endforelse
    </div>
  </div>
</section>

<section class="section--tight">
  <div class="container">
    <div class="cta-banner reveal">
      <div>
        <h2>Un projet en tête ?</h2>
        <p>Discutons de votre idée, je serai ravi d'échanger avec vous.</p>
      </div>
      <a href="{{ route('contact.show') }}" class="btn btn--primary">Écrire un message</a>
    </div>
  </div>
</section>

@endsection