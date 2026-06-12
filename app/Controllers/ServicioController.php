<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\SiteData;

final class ServicioController extends Controller
{
    public function index(): void
    {
        $this->view('servicio', [
            'title'  => 'ESAKO — Servicio',
            'active' => 'servicio',
            'panels' => SiteData::servicioPanels(),
        ]);
    }
}
