@extends('layouts.app')
@section('title', 'Page introuvable — KMS')
@section('content')

<section class="error-page container">
  <p class="error-page__code">404</p>
  <h1 style="font-size:1.6rem;">Erreur : page introuvable</h1>
  <p class="prose" style="max-width:480px;margin:0 auto 28px;">
    La page que vous cherchez n'existe pas, ou a été déplacée.
  </p>
  <div class="btn-row" style="justify-content:center;">
    <a href="{{ route('home') }}" class="btn btn--primary">Retour à l'accueil</a>
  </div>
</section>

@endsection
