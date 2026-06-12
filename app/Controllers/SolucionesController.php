<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\SiteData;

final class SolucionesController extends Controller
{
    public function index(): void
    {
        $this->view('soluciones', [
            'title'  => 'ESAKO — Soluciones',
            'active' => 'soluciones',
            'panels' => SiteData::solucionesPanels(),
        ]);
    }
}
