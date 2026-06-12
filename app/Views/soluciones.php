<?php use App\Core\View; ?>

<!-- ════════════ HERO — 4 PANELES ════════════ -->
<div class="panels panels--4">
  <?php foreach ($panels as $p): ?>
    <div class="panel" style="background-image:linear-gradient(rgba(8,16,30,.40),rgba(8,16,30,.52)),url('<?= View::e($p['img']) ?>')">
      <h2 class="panel-title">
        <?php foreach ($p['lines'] as $k => $line): ?><?= $k ? '<br>' : '' ?><?= View::e($line) ?><?php endforeach; ?>
      </h2>
    </div>
  <?php endforeach; ?>
</div>
