<?php $__env->startSection('title', 'Contact — KMS'); ?>
<?php $__env->startSection('content'); ?>

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

      <form method="POST" action="<?php echo e(route('contact.store')); ?>" novalidate>
        <?php echo csrf_field(); ?>
        
        <input type="text" name="website" style="display:none;">

        <div class="form-row">
          <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" placeholder="Votre nom" value="<?php echo e(old('name')); ?>" required>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="errorlist"><li><?php echo e($message); ?></li></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="vous@exemple.com" value="<?php echo e(old('email')); ?>" required>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="errorlist"><li><?php echo e($message); ?></li></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
        </div>

        <div class="form-group">
          <label for="subject">Sujet (facultatif)</label>
          <input type="text" name="subject" id="subject" placeholder="Sujet de votre message" value="<?php echo e(old('subject')); ?>">
          <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="errorlist"><li><?php echo e($message); ?></li></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea name="message" id="message" placeholder="Votre message..." rows="6" required><?php echo e(old('message')); ?></textarea>
          <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="errorlist"><li><?php echo e($message); ?></li></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="btn btn--primary btn--block">Envoyer le message</button>
      </form>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACCENT W5000\kms_laravel\resources\views/contact.blade.php ENDPATH**/ ?>