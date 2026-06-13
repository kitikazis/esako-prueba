<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\SiteData;

final class OportunidadesController extends Controller
{
    public function index(): void
    {
        $this->view('oportunidades', [
            'title'    => 'Oportunidades: boletines, cursos y empleos | ESAKO Perú',
            'desc'     => 'Boletines de mantenimiento, cursos de capacitación y empleos disponibles en ESAKO. Descubre promociones y únete a nuestro equipo en Perú.',
            'h1'       => 'Oportunidades en ESAKO: boletines, cursos y empleos',
            'active'   => 'oportunidades',
            'secciones'=> SiteData::oportunidades(),
        ]);
    }
}
