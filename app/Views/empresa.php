<?php use App\Core\View; use App\Models\SiteData; ?>

<!-- ════════════ EMPRESA / SUCURSALES ════════════ -->
<section class="empresa">
  <div class="empresa-bg" style="background-image:url('<?= SiteData::IMG ?>2025/10/1-29.jpg')"></div>
  <div class="empresa-veil"></div>

  <div class="empresa-wrap">
    <h2 class="empresa-title">Sucursales</h2>

    <div class="empresa-row">
      <div class="empresa-map">
        <img src="<?= View::e($empresa['mapa']) ?>" alt="Sucursales ESAKO — Perú" loading="lazy">
        <?php foreach ($empresa['sucursales'] as $i => $suc): ?>
          <span class="empresa-pin pin-<?= $i ?>"><?= View::e(strtoupper($suc)) ?></span>
        <?php endforeach; ?>
      </div>

      <div class="empresa-text">
        <h3>Nosotros</h3>
        <p><?php foreach ($empresa['nosotros'] as $k => $par): ?><?= $k ? '<br>' : '' ?><?= $par /* contiene <strong> */ ?><?php endforeach; ?></p>

        <h3>Visión - Misión</h3>
        <p><?= View::e($empresa['vision']) ?></p>

        <h3>Valores</h3>
        <p><?= View::e($empresa['valores']) ?></p>

        <h3>Contacto</h3>
        <p><a href="mailto:<?= View::e($empresa['contacto']) ?>" class="link"><?= View::e($empresa['contacto']) ?></a></p>
      </div>
    </div>
  </div>
</section>
