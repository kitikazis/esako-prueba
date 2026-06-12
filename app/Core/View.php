<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Motor de vistas: renderiza una vista dentro del layout principal.
 */
final class View
{
    /**
     * @param array<string,mixed> $data
     */
    public static function render(string $view, array $data = []): void
    {
        $viewFile = APP_PATH . '/Views/' . $view . '.php';
        if (!is_file($viewFile)) {
            http_response_code(500);
            echo "Vista no encontrada: {$view}";
            return;
        }

        // Variables disponibles en la vista y el layout
        $title  = $data['title']  ?? 'ESAKO';
        $active = $data['active'] ?? '';
        extract($data, EXTR_OVERWRITE);

        // 1) Renderiza la vista a un buffer ($content)
        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        // 2) Inserta $content dentro del layout
        require APP_PATH . '/Views/layouts/main.php';
    }

    /** Escape seguro para HTML */
    public static function e(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }

    /** Ruta base de assets (raíz del sitio) */
    public static function asset(string $path): string
    {
        return '/assets/' . ltrim($path, '/');
    }

    /** URL interna */
    public static function url(string $path = ''): string
    {
        return '/' . ltrim($path, '/');
    }
}
