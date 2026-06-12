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
            'title'    => 'ESAKO — Oportunidades',
            'active'   => 'oportunidades',
            'secciones'=> SiteData::oportunidades(),
        ]);
    }
}
