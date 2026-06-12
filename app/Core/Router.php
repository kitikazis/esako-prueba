<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Router minimalista: mapea una ruta (path) a "Controlador@metodo".
 */
final class Router
{
    /** @var array<string,string> */
    private array $routes = [];
    private string $notFound = '';

    public function add(string $path, string $handler): void
    {
        $this->routes[$this->normalize($path)] = $handler;
    }

    public function setNotFound(string $handler): void
    {
        $this->notFound = $handler;
    }

    public function dispatch(string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';

        // Quita un posible subdirectorio base (si la app no está en la raíz)
        $base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
        if ($base !== '' && strpos($path, $base) === 0) {
            $path = substr($path, strlen($base));
        }

        $path = $this->normalize($path);
        $handler = $this->routes[$path] ?? null;

        if ($handler === null) {
            http_response_code(404);
            $handler = $this->notFound ?: null;
            if ($handler === null) {
                echo '404 — Página no encontrada';
                return;
            }
        }

        [$controller, $method] = explode('@', $handler);
        $class = 'App\\Controllers\\' . $controller;
        (new $class())->{$method}();
    }

    private function normalize(string $path): string
    {
        $path = '/' . trim($path, '/');
        return $path === '/' ? '/' : rtrim($path, '/');
    }
}
