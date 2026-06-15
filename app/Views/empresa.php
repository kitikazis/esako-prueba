<?php use App\Core\View; ?>

<!-- ════════════ EMPRESA — HERO PROFESIONAL ════════════ -->
<section class="emp2">
  <div class="emp2-inner">

    <div class="emp2-text">
      <span class="emp2-eyebrow"><?= View::e(t('Soluciones industriales multimarca')) ?></span>
      <h1 class="emp2-title">
        <?= View::e(t('Impulsamos tu industria con')) ?>
        <span class="accent"><?= View::e(t('Rigor Técnico.')) ?></span>
      </h1>
      <p class="emp2-lead">
        <?= View::e(t('En ESAKO GLOBAL SAC brindamos mantenimiento e instalación multimarca con la mejor relación costo–beneficio para minería, pesca, agroindustria, construcción, automotriz y petróleo.')) ?>
      </p>

      <div class="emp2-cta">
        <a class="emp2-btn" href="<?= View::url('servicio') ?>"><?= View::e(t('Explorar Servicios')) ?></a>
        <a class="emp2-btn emp2-btn--ghost" href="https://wa.link/esako" target="_blank" rel="noopener">
          <i class="fab fa-whatsapp"></i> <?= View::e(t('Contáctanos')) ?>
        </a>
      </div>

      <div class="emp2-meta">
        <span class="emp2-branches">
          <i class="fas fa-location-dot"></i> <?= View::e(t('Sucursales')) ?>:
          <?php foreach ($empresa['sucursalesGeo'] as $i => $s): ?><?= $i ? ' · ' : ' ' ?><b><?= View::e(t($s['n'])) ?></b><?php endforeach; ?>
        </span>
        <a href="mailto:<?= View::e($empresa['contacto']) ?>" class="link"><?= View::e($empresa['contacto']) ?></a>
      </div>
    </div>

    <div class="emp2-map">
      <?php $puntos = $empresa['sucursalesGeo']; include APP_PATH . '/Views/partials/peru-map.php'; ?>
    </div>

  </div>
</section>
