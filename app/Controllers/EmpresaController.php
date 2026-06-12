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
            'title'   => 'ESAKO — Empresa',
            'active'  => 'empresa',
            'empresa' => SiteData::empresa(),
        ]);
    }
}
