<?php
/**
 * Layout principal. Variables disponibles: $title, $active, $content
 */
use App\Core\View;
use App\Core\Lang;
use App\Models\SiteData;

$menu        = SiteData::menu();
$servicioSub = SiteData::servicioMenu();
$solucionSub = SiteData::solucionesMenu();
$sidebar     = SiteData::sidebar();
?>
<!DOCTYPE html>
<html lang="<?= View::e(Lang::current()) ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= View::e($title) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="<?= View::asset('css/styles.css') ?>">
</head>
<body>

<!-- ════════════════════ NAV ════════════════════ -->
<nav class="nav">
  <a href="<?= View::url() ?>" class="nav-logo">
    <img src="<?= SiteData::IMG ?>2025/10/logo-alta-calidad-1.gif" alt="ESAKO"
         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
    <span class="nav-logo-fallback">ESAKO</span>
  </a>

  <input type="checkbox" id="navchk" class="nav-check">
  <label for="navchk" class="nav-burger" aria-label="Menú"><i class="fas fa-bars"></i></label>

  <div class="nav-links">
    <?php foreach ($menu as $item): ?>
      <?php if (!empty($item['dropdown'])): ?>
        <div class="nav-item has-dropdown">
          <a href="<?= View::url($item['url']) ?>" class="nav-link <?= $active === $item['key'] ? 'is-active' : '' ?>">
            <?= View::e(t($item['label'])) ?> <span class="caret">▼</span>
          </a>
          <div class="dropdown">
            <?php if ($item['dropdown'] === 'servicio'): ?>
              <span class="dropdown-title"><?= View::e(t('Mantenimiento e instalación de:')) ?></span>
              <?php foreach ($servicioSub as $sub): ?>
                <a href="<?= View::url('servicio') ?>" class="dropdown-item">• <?= View::e(t($sub)) ?></a>
              <?php endforeach; ?>
            <?php else: ?>
              <?php foreach ($solucionSub as $sub): ?>
                <a href="<?= View::url('soluciones') ?>" class="dropdown-item">• <?= View::e(t($sub)) ?></a>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      <?php else: ?>
        <a href="<?= View::url($item['url']) ?>" class="nav-link <?= $active === $item['key'] ? 'is-active' : '' ?>">
          <?= View::e(t($item['label'])) ?>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>

    <!-- Selector de idioma (server-side) -->
    <div class="lang-switch">
      <a href="?lang=es" title="Español" class="<?= Lang::is('es') ? 'is-active' : '' ?>"><img src="https://flagcdn.com/24x18/es.png" alt="ES"> ES</a>
      <a href="?lang=en" title="English" class="<?= Lang::is('en') ? 'is-active' : '' ?>"><img src="https://flagcdn.com/24x18/gb.png" alt="EN"> EN</a>
    </div>
  </div>
</nav>

<!-- ════════════════════ CONTENIDO ════════════════════ -->
<main class="page"><?= $content ?></main>

<!-- ════════════════════ BARRA LATERAL ════════════════════ -->
<div class="floatbar">
  <?php foreach ($sidebar as $s): ?>
    <a href="<?= View::e($s['url']) ?>" title="<?= View::e($s['title']) ?>"
       <?= !empty($s['blank']) ? 'target="_blank" rel="noopener"' : '' ?>
       style="--hov: <?= View::e($s['hover']) ?>"><i class="<?= View::e($s['icon']) ?>"></i></a>
  <?php endforeach; ?>
</div>

<!-- Botón flotante de WhatsApp -->
<a href="https://wa.link/esako" target="_blank" rel="noopener" class="fab-wa" title="Escríbenos por WhatsApp">
  <i class="fab fa-whatsapp"></i>
</a>

<script src="<?= View::asset('js/app.js') ?>"></script>
</body>
</html>
