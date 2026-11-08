<?php $__env->startSection('title', 'Blog — KMS'); ?>
<?php $__env->startSection('content'); ?>

<section class="section section--tight">
  <div class="container">
    <p class="eyebrow">blog</p>
    <h1 style="font-size:clamp(1.8rem,3.4vw,2.6rem);">Le blog</h1>
    <p class="prose">
      Notes de veille technologique, retours d'expérience et avancées sur mes projets de développement web et mobile.
    </p>

    <?php if($categories->isNotEmpty()): ?>
    <div class="filter-row">
      <a href="<?php echo e(route('blog.index')); ?>" class="filter-chip <?php if(!$activeCategory): ?> is-active <?php endif; ?>">Tous</a>
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(route('blog.category', $category)); ?>" class="filter-chip <?php if($activeCategory && $activeCategory->id === $category->id): ?> is-active <?php endif; ?>"><?php echo e($category->name); ?></a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<section class="section" style="padding-top:0;">
  <div class="container">
    <div class="grid grid--3">
      <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <article class="card post-card">
        <div class="post-card__media">
          <?php if($post->cover_image): ?><img src="<?php echo e(Storage::url($post->cover_image)); ?>" alt=""><?php endif; ?>
        </div>
        <div class="post-card__body">
          <div class="post-card__meta">
            <span class="badge"><?php echo e($post->category->name ?? 'Article'); ?></span>
            <span><?php echo e($post->published_at->format('d M Y')); ?></span>
            <span><?php echo e($post->reading_time); ?> min de lecture</span>
          </div>
          <h3><a href="<?php echo e(route('blog.show', $post)); ?>"><?php echo e($post->title); ?></a></h3>
          <p><?php echo e($post->excerpt); ?></p>
          <a class="post-card__link" href="<?php echo e(route('blog.show', $post)); ?>">Lire l'article →</a>
        </div>
      </article>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="empty-state" style="grid-column: 1/-1;">
        $ ls ./articles<br>Aucun article publié pour le moment. Revenez bientôt !
      </div>
      <?php endif; ?>
    </div>

    <?php if($posts->lastPage() > 1): ?>
    <div class="pagination">
      <?php if($posts->onFirstPage()): ?>
        <span class="is-current">Page <?php echo e($posts->currentPage()); ?> / <?php echo e($posts->lastPage()); ?></span>
      <?php else: ?>
        <a href="<?php echo e($posts->previousPageUrl()); ?><?php if($activeCategory): ?>?categorie=<?php echo e($activeCategory->slug); ?><?php endif; ?>">← Précédent</a>
        <span class="is-current">Page <?php echo e($posts->currentPage()); ?> / <?php echo e($posts->lastPage()); ?></span>
      <?php endif; ?>
      <?php if($posts->hasMorePages()): ?>
        <a href="<?php echo e($posts->nextPageUrl()); ?><?php if($activeCategory): ?>?categorie=<?php echo e($activeCategory->slug); ?><?php endif; ?>">Suivant →</a>
      <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACCENT W5000\kms_laravel\resources\views/blog/index.blade.php ENDPATH**/ ?>