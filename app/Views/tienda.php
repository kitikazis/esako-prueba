<?php use App\Core\View; ?>

<!-- ════════════ CATEGORÍAS ════════════ -->
<div class="shop-cats">
  <?php foreach ($categorias as $c): ?>
    <a href="#" class="shop-cat">
      <span class="shop-cat-img"><img src="<?= View::e($c['img']) ?>" alt="<?= View::e($c['label']) ?>" loading="lazy"></span>
      <span class="shop-cat-label"><?= View::e(strtoupper($c['label'])) ?></span>
    </a>
  <?php endforeach; ?>
</div>

<!-- ════════════ LAYOUT TIENDA ════════════ -->
<div class="shop">

  <aside class="shop-side">
    <h3 class="shop-h">Filtrar por Precio</h3>
    <div class="price-bar"><span class="knob"></span><span class="knob knob-r"></span></div>
    <p class="price-txt">Precio: <strong>S/50 — S/2,990</strong></p>
    <button class="btn-filter">Filtrar</button>

    <hr class="shop-hr">

    <h3 class="shop-h">Categorías del Producto</h3>
    <ul class="shop-catlist">
      <?php foreach ($sidebarCats as $c): ?>
        <li><a href="#" class="link"><?= View::e($c) ?></a></li>
      <?php endforeach; ?>
    </ul>

    <hr class="shop-hr">

    <h3 class="shop-h">Productos Más Vendidos</h3>
    <?php foreach ($masVendidos as $m): ?>
      <div class="best">
        <span class="best-img"><img src="<?= View::e($m['img']) ?>" alt="<?= View::e($m['t']) ?>" loading="lazy"></span>
        <div>
          <p class="best-t"><?= View::e(strtoupper($m['t'])) ?></p>
          <p class="best-p">S/<?= number_format($m['precio'], 2) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </aside>

  <main class="shop-main">
    <div class="shop-toolbar">
      <div class="crumb"><a href="<?= View::url() ?>" class="link">Inicio</a> / <span>Tienda</span></div>
      <div class="shop-tools">
        <span class="show">Mostrar: <a href="#" class="link">9</a> / <strong>12</strong> / <a href="#" class="link">18</a> / <a href="#" class="link">24</a></span>
        <select class="shop-sort" aria-label="Ordenar">
          <option>Orden predeterminado</option>
          <option>Ordenar por popularidad</option>
          <option>Precio: bajo a alto</option>
          <option>Precio: alto a bajo</option>
        </select>
      </div>
    </div>

    <div class="prod-grid">
      <?php foreach ($productos as $p): ?>
        <div class="prod">
          <div class="prod-img"><img src="<?= View::e($p['img']) ?>" alt="<?= View::e($p['t']) ?>" loading="lazy"></div>
          <h4 class="prod-t"><?= View::e(strtoupper($p['t'])) ?></h4>
          <p class="prod-cat"><?= View::e(strtoupper($p['cat'])) ?></p>
          <p class="prod-price">S/<?= number_format($p['precio'], 2) ?></p>
          <button class="btn-cart">Añadir al carrito</button>
        </div>
      <?php endforeach; ?>
    </div>
  </main>

</div>
