<?php use App\Core\View; ?>

<!-- ════════════ FRANJA DE VALOR + SOCIAL PROOF ════════════ -->
<div class="vstrip">
  <div class="vstrip-main">
    <h1><?= View::e(t('Mantenimiento e instalación multimarca')) ?></h1>
    <p><?= View::e(t('La mejor relación costo–beneficio para motores, hidráulica y energía.')) ?></p>
  </div>
  <div class="vstrip-proof">
    <span class="pf"><i class="fas fa-wrench"></i> <?= View::e(t('Servicio multimarca')) ?></span>
    <span class="pf"><i class="fas fa-map-marker-alt"></i> <?= View::e(t('Sucursales en Chimbote y Lima')) ?></span>
    <span class="pf"><i class="fas fa-bolt"></i> <?= View::e(t('Cotiza en 24 h')) ?></span>
  </div>
  <a href="https://wa.link/esako" target="_blank" rel="noopener" class="vstrip-cta">
    <i class="fab fa-whatsapp"></i> <?= View::e(t('Solicitar cotización')) ?>
  </a>
</div>

<!-- ════════════ NUESTROS SERVICIOS ════════════ -->
<section class="srv" aria-labelledby="srv-titulo">
  <div class="srv-head">
    <h2 id="srv-titulo"><?= View::e(t('Nuestros Servicios')) ?></h2>
    <span class="srv-rule"></span>
    <p><?= View::e(t('Mantenimiento e instalación multimarca con la mejor relación costo–beneficio.')) ?></p>
  </div>

  <div class="srv-grid">
    <?php foreach ($servicios as $s): ?>
      <article class="srv-card">
        <div class="srv-card-img">
          <img src="<?= View::e($s['img']) ?>" alt="<?= View::e(t($s['t'])) ?>" loading="lazy">
        </div>
        <div class="srv-card-body">
          <h3><?= View::e(t($s['t'])) ?></h3>
          <p><?= View::e(t($s['desc'])) ?></p>
          <a href="https://wa.link/esako" target="_blank" rel="noopener" class="srv-cta">
            <?= View::e(t('Solicitar')) ?> <span aria-hidden="true">→</span>
          </a>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>
