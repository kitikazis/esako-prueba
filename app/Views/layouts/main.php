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
$empresaData = SiteData::empresa();

/* SEO: descripción por página (con respaldo) y datos de marca */
$metaDesc = $desc ?? 'ESAKO: mantenimiento, reparación e instalación multimarca de motores diésel, sistemas hidráulicos y grupos electrógenos. Sucursales en Chimbote y Lima, Perú.';
$ogImage  = SiteData::IMG . '2021/08/6.jpg';
$canonical = (($_SERVER['HTTPS'] ?? '') === 'on' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'esako.com.pe') . strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
?>
<!DOCTYPE html>
<html lang="<?= View::e(Lang::current()) ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= View::e($title) ?></title>
  <meta name="description" content="<?= View::e($metaDesc) ?>">
  <link rel="canonical" href="<?= View::e($canonical) ?>">

  <!-- Open Graph / redes sociales -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="ESAKO">
  <meta property="og:locale" content="<?= Lang::is('en') ? 'en_US' : 'es_PE' ?>">
  <meta property="og:title" content="<?= View::e($title) ?>">
  <meta property="og:description" content="<?= View::e($metaDesc) ?>">
  <meta property="og:url" content="<?= View::e($canonical) ?>">
  <meta property="og:image" content="<?= View::e($ogImage) ?>">
  <meta name="twitter:card" content="summary_large_image">

  <!-- Datos estructurados: negocio local (SEO local — 2 sucursales) -->
  <script type="application/ld+json">
  <?= json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'LocalBusiness',
    'name'     => 'ESAKO',
    'description' => $metaDesc,
    'url'      => $canonical,
    'email'    => $empresaData['contacto'] ?? 'esako@esako.com.pe',
    'image'    => $ogImage,
    'areaServed' => 'Perú',
    'address'  => array_map(static fn($s) => [
        '@type' => 'PostalAddress', 'addressLocality' => $s, 'addressCountry' => 'PE',
    ], $empresaData['sucursales'] ?? ['Chimbote', 'Lima']),
  ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://esako.com.pe">
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet">
  <!-- FontAwesome no-bloqueante (no retrasa el render del contenido) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        media="print" onload="this.media='all'">
  <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"></noscript>
  <link rel="stylesheet" href="<?= View::asset('css/styles.css') ?>">
</head>
<body>

<!-- Salto al contenido (accesibilidad por teclado, WCAG 2.4.1) -->
<a href="#contenido" class="skip-link"><?= View::e(t('Saltar al contenido')) ?></a>

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
<main id="contenido" class="page page--<?= View::e($active) ?>">
  <?php /* H1 semántico para páginas cuyo título visible no es un H1 */ ?>
  <?php if (!empty($h1)): ?><h1 class="visually-hidden"><?= View::e(t($h1)) ?></h1><?php endif; ?>
  <?= $content ?>
</main>

<!-- ════════════════════ BARRA LATERAL (oculta en el inicio) ════════════════════ -->
<?php if ($active !== 'home'): ?>
<div class="floatbar">
  <?php foreach ($sidebar as $s): ?>
    <a href="<?= View::e($s['url']) ?>" title="<?= View::e($s['title']) ?>"
       <?= !empty($s['blank']) ? 'target="_blank" rel="noopener"' : '' ?>
       style="--hov: <?= View::e($s['hover']) ?>"><i class="<?= View::e($s['icon']) ?>"></i></a>
  <?php endforeach; ?>
</div>
<?php endif; ?>

<!-- Botón flotante de WhatsApp -->
<a href="https://wa.link/esako" target="_blank" rel="noopener" class="fab-wa" title="Escríbenos por WhatsApp">
  <i class="fab fa-whatsapp"></i>
</a>

<script src="<?= View::asset('js/app.js') ?>"></script>
</body>
</html>
