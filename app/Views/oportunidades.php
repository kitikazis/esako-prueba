<?php use App\Core\View; ?>

<!-- ════════════ OPORTUNIDADES ════════════ -->
<section class="oport">
  <?php foreach ($secciones as $titulo => $items): ?>
    <h2 class="oport-title"><?= View::e(strtoupper(t($titulo))) ?></h2>
    <div class="oport-grid">
      <?php foreach ($items as $it): ?>
        <figure class="oport-card">
          <img src="<?= View::e($it['img']) ?>" alt="<?= View::e(t($it['t'])) ?>" loading="lazy">
          <figcaption><?= View::e(strtoupper(t($it['t']))) ?></figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</section>
