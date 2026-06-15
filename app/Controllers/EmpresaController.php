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
            'desc'    => 'Conoce ESAKO: soluciones industriales multimarca con la mejor relación costo–beneficio. Sucursales en Chimbote y Lima, Perú.',
            'active'  => 'empresa',
            'empresa' => SiteData::empresa(),
        ]);
    }
}
