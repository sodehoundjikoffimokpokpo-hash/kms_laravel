<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $__env->yieldContent('title', 'KMS — Portfolio & Blog'); ?></title>
<meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Portfolio et blog de SODEHOUNDJI Koffi Mokpokpo — Génie Informatique, développement web et mobile.'); ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='12' fill='%230B1411'/%3E%3Ctext x='32' y='40' font-size='22' font-family='monospace' font-weight='700' fill='%23F4B740' text-anchor='middle'%3EKMS%3C/text%3E%3C/svg%3E">
</head>
<body>

<a class="skip-link" href="#main-content">Aller au contenu</a>

<header class="site-header">
  <div class="container site-header__inner">
    <a href="<?php echo e(route('home')); ?>" class="logo" aria-label="KMS — accueil">
      <span class="logo__bracket">&lt;</span><span class="logo__text">KMS</span><span class="logo__bracket">/&gt;</span>
    </a>

    <nav class="main-nav" id="main-nav" aria-label="Navigation principale">
      <a href="<?php echo e(route('home')); ?>" class="main-nav__link <?php if(request()->routeIs('home')): ?> is-active <?php endif; ?>">Accueil</a>
      <a href="<?php echo e(route('about')); ?>" class="main-nav__link <?php if(request()->routeIs('about')): ?> is-active <?php endif; ?>">À propos</a>
      <a href="<?php echo e(route('projects.index')); ?>" class="main-nav__link <?php if(request()->routeIs('projects.*')): ?> is-active <?php endif; ?>">Projets</a>
      <a href="<?php echo e(route('blog.index')); ?>" class="main-nav__link <?php if(request()->routeIs('blog.*')): ?> is-active <?php endif; ?>">Blog</a>
      <a href="<?php echo e(route('contact.show')); ?>" class="main-nav__link main-nav__link--cta <?php if(request()->routeIs('contact.*')): ?> is-active <?php endif; ?>">Contact</a>
    </nav>

    <button class="nav-toggle" id="navToggle" aria-expanded="false" aria-controls="main-nav" aria-label="Ouvrir le menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<main id="main-content">
<?php if(session('message')): ?>
  <div class="container">
    <div class="alerts">
      <div class="alert alert--success"><?php echo e(session('message')); ?></div>
    </div>
  </div>
<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>
</main>

<footer class="site-footer">
  <div class="container site-footer__inner">
    <div class="site-footer__brand">
      <a href="<?php echo e(route('home')); ?>" class="logo logo--small" aria-label="KMS — accueil">
        <span class="logo__bracket">&lt;</span><span class="logo__text">KMS</span><span class="logo__bracket">/&gt;</span>
      </a>
      <p class="site-footer__tagline">Étudiant en Génie Informatique — Développement d'applications</p>
    </div>

    <div class="site-footer__col">
      <p class="site-footer__heading">// navigation</p>
      <a href="<?php echo e(route('home')); ?>">Accueil</a>
      <a href="<?php echo e(route('about')); ?>">À propos</a>
      <a href="<?php echo e(route('projects.index')); ?>">Projets</a>
      <a href="<?php echo e(route('blog.index')); ?>">Blog</a>
    </div>

    <div class="site-footer__col">
      <p class="site-footer__heading">// contact</p>
      <a href="mailto:koffimokpokposodehoundji@gmail.com">koffimokpokposodehoundji@gmail.com</a>
      <a href="tel:+22870782133">+228 70 78 21 33</a>
      <span class="site-footer__muted">Lomé, Togo</span>
    </div>
  </div>
  <div class="container">
    <p class="site-footer__copyright">© <?php echo e(now()->year); ?> SODEHOUNDJI Koffi Mokpokpo. Tous droits réservés.</p>
  </div>
</footer>

<script src="<?php echo e(asset('js/main.js')); ?>"></script>
<?php echo $__env->yieldContent('extra_js'); ?>
</body>
</html><?php /**PATH C:\Users\ACCENT W5000\kms_laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>