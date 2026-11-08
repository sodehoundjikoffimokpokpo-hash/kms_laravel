@extends('layouts.app')
@section('title', 'Contact — KMS')
@section('content')

<section class="section">
  <div class="container">
    <p class="eyebrow">contact</p>
    <h1 style="font-size:clamp(1.8rem,3.4vw,2.6rem);">Discutons de votre projet</h1>
    <p class="prose" style="font-size:1.06rem;margin-bottom:40px;">
      Une question, une opportunité de stage, une idée de collaboration ? Écrivez-moi, je réponds avec plaisir.
    </p>

    <div class="contact-grid">
      <div class="contact-card">
        <div class="contact-card__item">
          <span class="contact-card__label">E-mail</span>
          <span class="contact-card__value">koffimokpokposodehoundji@gmail.com</span>
          <button type="button" class="btn btn--ghost" style="margin-top:8px;width:fit-content;" data-copy="koffimokpokposodehoundji@gmail.com">Copier l'adresse</button>
        </div>
        <div class="contact-card__item">
          <span class="contact-card__label">Téléphone</span>
          <span class="contact-card__value">+228 70 78 21 33</span>
        </div>
        <div class="contact-card__item">
          <span class="contact-card__label">Localisation</span>
          <span class="contact-card__value">Lomé, Togo</span>
        </div>
      </div>

      <form method="POST" action="{{ route('contact.store') }}" novalidate>
        @csrf
        
        <input type="text" name="website" style="display:none;">

        <div class="form-row">
          <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" placeholder="Votre nom" value="{{ old('name') }}" required>
            @error('name')<div class="errorlist"><li>{{ $message }}</li></div>@enderror
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="vous@exemple.com" value="{{ old('email') }}" required>
            @error('email')<div class="errorlist"><li>{{ $message }}</li></div>@enderror
          </div>
        </div>

        <div class="form-group">
          <label for="subject">Sujet (facultatif)</label>
          <input type="text" name="subject" id="subject" placeholder="Sujet de votre message" value="{{ old('subject') }}">
          @error('subject')<div class="errorlist"><li>{{ $message }}</li></div>@enderror
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea name="message" id="message" placeholder="Votre message..." rows="6" required>{{ old('message') }}</textarea>
          @error('message')<div class="errorlist"><li>{{ $message }}</li></div>@enderror
        </div>

        <button type="submit" class="btn btn--primary btn--block">Envoyer le message</button>
      </form>
    </div>
  </div>
</section>

@endsection
