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
            'title'     => 'Soluciones y productos industriales multimarca | ESAKO Perú',
            'desc'      => 'Soluciones integrales para tu operación: motores, transmisiones, repuestos, filtros y aceites con la mejor relación costo–beneficio. ESAKO Perú.',
            'active'    => 'soluciones',
            'soluciones'=> SiteData::solucionesDetalle(),
        ]);
    }
}
