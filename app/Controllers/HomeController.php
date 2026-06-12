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
            'title'    => 'ESAKO — Inicio',
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
