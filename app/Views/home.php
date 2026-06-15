<?php use App\Core\View; ?>

<!-- ════════════ HERO CON VIDEO DE FONDO (una sola pantalla) ════════════ -->
<section class="vhero" data-vhero>
  <!-- Video de fondo. NOTA: hero-demo.mp4 es un clip de REFERENCIA (CC0).
       Reemplázalo por el video real de ESAKO en assets/video/. -->
  <video class="vhero-video" autoplay muted loop playsinline preload="auto"
         poster="<?= View::e($slides[0]['img']) ?>">
    <source src="<?= View::asset('video/hero-demo.mp4') ?>" type="video/mp4">
  </video>
  <div class="vhero-veil"></div>

  <div class="vhero-content">
    <h1 class="vhero-title">
      <?= View::e(t('Mantenimiento e instalación multimarca')) ?>
      <span><?= View::e(t('Motores diésel · Hidráulica · Energía')) ?></span>
    </h1>
    <p class="vhero-sub"><?= View::e(t('Soluciones industriales con la mejor relación costo–beneficio. Sucursales en Chimbote y Lima.')) ?></p>

    <div class="vhero-cta">
      <!-- TODO: enlazar Brochure al PDF real cuando esté disponible -->
      <a class="btn-hero btn-hero--primary" href="#" >
        <i class="fas fa-book-open"></i> <?= View::e(t('Brochure')) ?>
      </a>
      <a class="btn-hero btn-hero--ghost" href="https://wa.link/esako" target="_blank" rel="noopener">
        <i class="fab fa-whatsapp"></i> <?= View::e(t('Contáctanos')) ?>
      </a>
    </div>
  </div>

  <button class="vhero-toggle" data-vhero-toggle aria-label="<?= View::e(t('Pausar o reproducir el video')) ?>">
    <i class="fas fa-pause"></i>
  </button>
</section>
