@extends('layouts.app')
@section('title', 'Erreur serveur — KMS')
@section('content')

<section class="error-page container">
  <p class="error-page__code">500</p>
  <h1 style="font-size:1.6rem;">Erreur interne du serveur</h1>
  <p class="prose" style="max-width:480px;margin:0 auto 28px;">
    Quelque chose s'est mal passé de notre côté. Merci de réessayer dans quelques instants.
  </p>
  <div class="btn-row" style="justify-content:center;">
    <a href="{{ route('home') }}" class="btn btn--primary">Retour à l'accueil</a>
  </div>
</section>

@endsection
