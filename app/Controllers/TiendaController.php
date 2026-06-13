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
            'title'       => 'Tienda de repuestos, filtros y aceites multimarca | ESAKO Perú',
            'desc'        => 'Compra repuestos, filtros, aceites y refrigerantes para motores diésel y maquinaria. Productos multimarca con garantía. Tienda online ESAKO Perú.',
            'h1'          => 'Tienda ESAKO: repuestos, filtros y aceites multimarca',
            'active'      => 'tienda',
            'categorias'  => SiteData::tiendaCategorias(),
            'sidebarCats' => SiteData::tiendaSidebarCats(),
            'productos'   => SiteData::productos(),
            'masVendidos' => SiteData::masVendidos(),
        ]);
    }
}
