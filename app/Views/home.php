<?php use App\Core\View; ?>

<!-- ════════════ HERO SLIDER ════════════ -->
<div class="hero" data-hero>
  <?php foreach ($slides as $i => $s): ?>
    <div class="hero-slide<?= $i === 0 ? ' is-active' : '' ?>"
         data-title="<?= View::e($s['title']) ?>" data-sub="<?= View::e($s['sub']) ?>"
         style="background-image:linear-gradient(to right,rgba(4,10,22,.80) 0%,rgba(4,10,22,.40) 52%,rgba(4,10,22,.10) 100%),url('<?= View::e($s['img']) ?>')"></div>
  <?php endforeach; ?>

  <div class="hero-text">
    <h1 data-hero-title><?= View::e($slides[0]['title']) ?></h1>
    <h2 data-hero-sub><?= View::e($slides[0]['sub']) ?></h2>
  </div>

  <button class="hero-arrow prev" data-hero-prev aria-label="Anterior">‹</button>
  <button class="hero-arrow next" data-hero-next aria-label="Siguiente">›</button>
</div>

<div class="hero-dots" data-hero-dots>
  <?php foreach ($slides as $i => $s): ?>
    <button class="dot<?= $i === 0 ? ' is-active' : '' ?>" data-dot="<?= $i ?>" aria-label="Slide <?= $i + 1 ?>"></button>
  <?php endforeach; ?>
</div>

<!-- ════════════ CARRUSEL DE PRODUCTOS ════════════ -->
<div class="carousel" data-carousel>
  <div class="carousel-track" data-carousel-track>
    <?php foreach ($carousel as $c): ?>
      <div class="carousel-item">
        <img src="<?= View::e($c['img']) ?>" alt="<?= View::e($c['title']) ?>" loading="lazy">
        <div class="carousel-cap"><span><?= View::e($c['title']) ?></span></div>
      </div>
    <?php endforeach; ?>
  </div>
  <button class="carousel-arrow prev" data-carousel-prev aria-label="Anterior">‹</button>
  <button class="carousel-arrow next" data-carousel-next aria-label="Siguiente">›</button>
</div>
