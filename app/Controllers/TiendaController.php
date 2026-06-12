<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\SiteData;

final class TiendaController extends Controller
{
    public function index(): void
    {
        $this->view('tienda', [
            'title'       => 'ESAKO — Tienda',
            'active'      => 'tienda',
            'categorias'  => SiteData::tiendaCategorias(),
            'sidebarCats' => SiteData::tiendaSidebarCats(),
            'productos'   => SiteData::productos(),
            'masVendidos' => SiteData::masVendidos(),
        ]);
    }
}
