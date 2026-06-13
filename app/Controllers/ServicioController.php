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
            'title'     => 'Servicio de mantenimiento y reparación multimarca | ESAKO Perú',
            'desc'      => 'Mantenimiento e instalación multimarca: motores diésel, hidráulica, transmisiones, grupos electrógenos, tableros y cámaras. Cotiza en 24 h con ESAKO Perú.',
            'active'    => 'servicio',
            'servicios' => SiteData::servicios(),
        ]);
    }
}
