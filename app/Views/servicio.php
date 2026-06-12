<?php use App\Core\View; ?>

<!-- ════════════ HERO — 2 PANELES ════════════ -->
<div class="panels panels--2 panels--hero">
  <?php foreach ($panels as $p): ?>
    <div class="panel" style="background-image:linear-gradient(rgba(8,16,30,.45),rgba(8,16,30,.55)),url('<?= View::e($p['img']) ?>')">
      <h2 class="panel-title">
        <?php foreach ($p['lines'] as $k => $line): ?><?= $k ? '<br>' : '' ?><?= View::e(t($line)) ?><?php endforeach; ?>
      </h2>
    </div>
  <?php endforeach; ?>
</div>

<!-- ════════════ NUESTROS SERVICIOS ════════════ -->
<section class="srv">
  <div class="srv-head">
    <h2><?= View::e(t('Nuestros Servicios')) ?></h2>
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
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>
