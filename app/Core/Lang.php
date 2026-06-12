<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Internacionalización (i18n) propia, sin servicios externos.
 *
 * - El idioma se guarda en la cookie "lang" (es | en). Por defecto: es.
 * - La traducción es por "cadena origen": t('Texto en español') devuelve
 *   el inglés si existe en el diccionario y el idioma activo es 'en';
 *   en caso contrario devuelve el español tal cual.
 */
final class Lang
{
    private static string $lang = 'es';
    /** @var array<string,string> */
    private static array $dict = [];

    public static function boot(): void
    {
        $l = $_COOKIE['lang'] ?? 'es';
        self::$lang = ($l === 'en') ? 'en' : 'es';

        if (self::$lang === 'en') {
            $file = APP_PATH . '/Lang/en.php';
            if (is_file($file)) {
                /** @var array<string,string> $dict */
                $dict = require $file;
                self::$dict = $dict;
            }
        }
    }

    public static function current(): string
    {
        return self::$lang;
    }

    public static function is(string $l): bool
    {
        return self::$lang === $l;
    }

    /** Traduce una cadena origen (español) al idioma activo. */
    public static function t(string $es): string
    {
        if (self::$lang === 'es') {
            return $es;
        }
        return self::$dict[$es] ?? $es;
    }
}
