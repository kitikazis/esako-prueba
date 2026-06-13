<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\SiteData;

final class EmpresaController extends Controller
{
    public function index(): void
    {
        $this->view('empresa', [
            'title'   => 'Empresa y sucursales en Chimbote y Lima | ESAKO Perú',
            'desc'    => 'Conoce ESAKO: misión, visión, valores y nuestras sucursales en Chimbote y Lima, Perú. Soluciones industriales multimarca con vocación de servicio.',
            'h1'      => 'ESAKO — Empresa, misión y sucursales en Perú',
            'active'  => 'empresa',
            'empresa' => SiteData::empresa(),
        ]);
    }
}
