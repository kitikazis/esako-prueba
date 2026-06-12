<?php
/**
 * ESAKO — Front Controller (punto de entrada único)
 * Arquitectura MVC. Todas las peticiones pasan por aquí (vía .htaccess).
 */

declare(strict_types=1);

define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app');

/* Servir assets estáticos cuando se usa el servidor integrado (php -S).
   En producción (Apache) esto nunca se ejecuta porque .htaccess ya los sirve. */
if (PHP_SAPI === 'cli-server') {
    $file = BASE_PATH . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (is_file($file)) {
        return false;
    }
}

/* ---------- Autoloader PSR-4 simple (namespace App\) ---------- */
spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
        return;
    }
    $relative = substr($class, strlen($prefix));
    $file = APP_PATH . '/' . str_replace('\\', '/', $relative) . '.php';
    if (is_file($file)) {
        require $file;
    }
});

use App\Core\Router;
use App\Core\Lang;

/* ---------- Idioma (i18n propio) ----------
   ?lang=es|en  →  guarda cookie y redirige a la URL limpia (sin query). */
if (isset($_GET['lang'])) {
    $l = ($_GET['lang'] === 'en') ? 'en' : 'es';
    setcookie('lang', $l, [
        'expires'  => time() + 31536000,
        'path'     => '/',
        'samesite' => 'Lax',
    ]);
    $path = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
    header('Location: ' . ($path !== false ? $path : '/'));
    exit;
}
Lang::boot();

/* El HTML siempre fresco: el navegador revalida cada carga, así el usuario
   siempre recibe la última versión (que referencia los assets versionados). */
if (!headers_sent()) {
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    header('Pragma: no-cache');
}

/** Helper global de traducción disponible en todas las vistas. */
function t(string $es): string
{
    return Lang::t($es);
}

/* ---------- Arranque ---------- */
$router = new Router();
require BASE_PATH . '/config/routes.php';   // registra las rutas en $router
$router->dispatch($_SERVER['REQUEST_URI'] ?? '/');
