<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Controlador base. Ofrece el helper view() para renderizar.
 */
abstract class Controller
{
    /**
     * @param array<string,mixed> $data
     */
    protected function view(string $view, array $data = []): void
    {
        View::render($view, $data);
    }
}
