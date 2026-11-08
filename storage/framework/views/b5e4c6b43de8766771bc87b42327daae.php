<?php $__env->startSection('title', 'Projets — KMS'); ?>
<?php $__env->startSection('content'); ?>

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
      <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <article class="card project-card">
        <div class="project-card__media">
          <?php if($project->image): ?>
            <img src="<?php echo e(Storage::url($project->image)); ?>" alt="Capture d'écran du projet <?php echo e($project->title); ?>">
          <?php else: ?>
            <span class="project-card__initials"><?php echo e(substr($project->title, 0, 2)); ?></span>
          <?php endif; ?>
        </div>
        <div class="project-card__body">
          <h3><a href="<?php echo e(route('projects.show', $project)); ?>"><?php echo e($project->title); ?></a></h3>
          <p><?php echo e($project->short_description); ?></p>
          <ul class="tag-list">
            <?php $__currentLoopData = $project->technology_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li class="tag"><?php echo e($tech); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          <div class="card-links">
            <a href="<?php echo e(route('projects.show', $project)); ?>">Détails →</a>
            <?php if($project->demo_url): ?><a href="<?php echo e($project->demo_url); ?>" target="_blank" rel="noopener">Démo ↗</a><?php endif; ?>
          </div>
        </div>
      </article>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="empty-state" style="grid-column: 1/-1;">
        $ ls ./projets<br>Aucun projet pour l'instant — cette page se remplira au fur et à mesure.
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACCENT W5000\kms_laravel\resources\views/projects/index.blade.php ENDPATH**/ ?>