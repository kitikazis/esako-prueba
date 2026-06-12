<?php use App\Core\View; ?>

<!-- ════════════ HERO — 4 PANELES ════════════ -->
<div class="panels panels--4 panels--hero">
  <?php foreach ($panels as $p): ?>
    <div class="panel" style="background-image:linear-gradient(rgba(8,16,30,.40),rgba(8,16,30,.52)),url('<?= View::e($p['img']) ?>')">
      <h2 class="panel-title">
        <?php foreach ($p['lines'] as $k => $line): ?><?= $k ? '<br>' : '' ?><?= View::e(t($line)) ?><?php endforeach; ?>
      </h2>
    </div>
  <?php endforeach; ?>
</div>

<!-- ════════════ NUESTRAS SOLUCIONES ════════════ -->
<section class="srv">
  <div class="srv-head">
    <h2><?= View::e(t('Nuestras Soluciones')) ?></h2>
    <span class="srv-rule"></span>
    <p><?= View::e(t('Productos y soluciones integrales para tu operación, con la mejor relación costo–beneficio.')) ?></p>
  </div>

  <div class="srv-grid">
    <?php foreach ($soluciones as $s): ?>
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
