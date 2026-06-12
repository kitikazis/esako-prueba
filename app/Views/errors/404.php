<?php use App\Core\View; ?>
<section class="notfound">
  <h1>404</h1>
  <p><?= View::e(t('La página que buscas no existe.')) ?></p>
  <a href="<?= View::url() ?>" class="btn-cart"><?= View::e(t('Volver al inicio')) ?></a>
</section>
