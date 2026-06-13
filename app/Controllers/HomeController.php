<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\SiteData;

final class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home', [
            'title'    => 'ESAKO | Mantenimiento e instalación multimarca de motores diésel en Perú',
            'desc'     => 'Mantenimiento, reparación e instalación multimarca de motores diésel, sistemas hidráulicos, grupos electrógenos y más. Sucursales en Chimbote y Lima. Cotiza hoy.',
            'active'   => 'home',
            'slides'   => SiteData::heroSlides(),
            'carousel' => SiteData::carousel(),
        ]);
    }

    public function notFound(): void
    {
        $this->view('errors/404', [
            'title'  => 'Página no encontrada',
            'active' => '',
        ]);
    }
}
