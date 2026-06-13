<?php use App\Core\View; use App\Models\SiteData; ?>

<!-- ════════════ EMPRESA / SUCURSALES ════════════ -->
<section class="empresa">
  <div class="empresa-bg" style="background-image:url('<?= SiteData::IMG ?>2025/10/1-29.jpg')"></div>
  <div class="empresa-veil"></div>

  <div class="empresa-wrap">
    <h2 class="empresa-title"><?= View::e(t('Sucursales')) ?></h2>

    <div class="empresa-row">
      <div class="empresa-left">
        <div class="empresa-map">
          <?php $puntos = $empresa['sucursalesGeo']; include APP_PATH . '/Views/partials/peru-map.php'; ?>
        </div>

        <div class="sectores">
          <h3 class="sectores-h"><?= View::e(t('Sectores que atendemos')) ?></h3>
          <div class="sectores-grid">
            <?php foreach ($empresa['sectores'] as $sec): ?>
              <div class="sector">
                <span class="sector-img"><img src="<?= View::e($sec['img']) ?>" alt="<?= View::e(t($sec['label'])) ?>" loading="lazy"></span>
                <span class="sector-lbl"><?= View::e(strtoupper(t($sec['label']))) ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="empresa-text">
        <h3><?= View::e(t('Nosotros')) ?></h3>
        <p><?php foreach ($empresa['nosotros'] as $k => $par): ?><?= $k ? '<br>' : '' ?><?= t($par) /* contiene <strong> */ ?><?php endforeach; ?></p>

        <h3><?= View::e(t('Visión - Misión')) ?></h3>
        <p><?= View::e(t($empresa['vision'])) ?></p>

        <h3><?= View::e(t('Valores')) ?></h3>
        <p><?= View::e(t($empresa['valores'])) ?></p>

        <h3><?= View::e(t('Contacto')) ?></h3>
        <p><a href="mailto:<?= View::e($empresa['contacto']) ?>" class="link"><?= View::e($empresa['contacto']) ?></a></p>
      </div>
    </div>
  </div>
</section>
