<?php use App\Core\View; ?>

<!-- ════════════ OPORTUNIDADES ════════════ -->
<section class="oport">
  <?php foreach ($secciones as $titulo => $items): ?>
    <?php $esEmpleo = (stripos($titulo, 'Empleo') !== false); ?>
    <div class="oport-block">
      <h2 class="oport-title"><?= View::e(strtoupper(t($titulo))) ?></h2>

      <div class="oport-grid <?= $esEmpleo ? 'oport-grid--jobs' : '' ?>">
        <?php foreach ($items as $it): ?>

          <?php if ($esEmpleo): /* Tarjeta de empleo: icono + título + CTA (sin stock) */ ?>
            <a class="job-card"
               href="mailto:rrhh@esako.com.pe?subject=<?= View::e(rawurlencode('Postulación: ' . t($it['t']))) ?>">
              <span class="job-ico"><i class="fas fa-briefcase"></i></span>
              <span class="job-t"><?= View::e(t($it['t'])) ?></span>
              <span class="job-cta"><?= View::e(t('Enviar CV')) ?> <span aria-hidden="true">→</span></span>
            </a>

          <?php else: /* Boletín / Curso: tarjeta con imagen uniforme */ ?>
            <a class="oport-card" href="https://wa.link/esako" target="_blank" rel="noopener"
               title="<?= View::e(t('Más información')) ?>">
              <span class="oport-card-img">
                <img src="<?= View::e($it['img']) ?>" alt="<?= View::e(t($it['t'])) ?>" loading="lazy">
              </span>
              <span class="oport-cap"><?= View::e(t($it['t'])) ?></span>
            </a>
          <?php endif; ?>

        <?php endforeach; ?>
      </div>
    </div>
  <?php endforeach; ?>
</section>
