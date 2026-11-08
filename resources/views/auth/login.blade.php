@extends('layouts.app')
@section('title', 'Connexion Admin — KMS')
@section('content')

<section class="section" style="padding: 80px 0;">
  <div class="container" style="max-width: 480px;">
    <div class="contact-card">
      <h2 style="margin-bottom: 24px; font-size: 1.5rem;">Connexion Admin</h2>
      
      @if($errors->any())
        <div class="alert alert--error" style="margin-bottom: 24px;">
          @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
          @endforeach
        </div>
      @endif

      <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" class="btn btn--primary btn--block">Se connecter</button>
      </form>

      <p style="text-align: center; margin-top: 24px; font-size: 0.9rem;">
        <a href="{{ route('home') }}" style="color: var(--text-muted);">← Retour à l'accueil</a>
      </p>
    </div>
  </div>
</section>

@endsection
