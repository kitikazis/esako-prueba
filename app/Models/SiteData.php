<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Fuente de datos del sitio (catálogo, menús, secciones).
 * En una app real esto vendría de una base de datos; aquí se centraliza
 * para que las vistas no tengan datos "hardcodeados".
 */
final class SiteData
{
    public const IMG = 'https://esako.com.pe/wp-content/uploads/';

    /** Ítems del menú de navegación principal */
    public static function menu(): array
    {
        return [
            ['label' => 'Inicio',         'url' => '/',              'key' => 'home'],
            ['label' => 'Empresa',        'url' => '/empresa',       'key' => 'empresa'],
            ['label' => 'Servicio',       'url' => '/servicio',      'key' => 'servicio', 'dropdown' => 'servicio'],
            ['label' => 'Soluciones',     'url' => '/soluciones',    'key' => 'soluciones', 'dropdown' => 'soluciones'],
            ['label' => 'Oportunidades',  'url' => '/oportunidades', 'key' => 'oportunidades'],
            ['label' => 'Clientes',       'url' => '#',              'key' => 'clientes'],
            ['label' => 'Usuarios',       'url' => '#',              'key' => 'usuarios'],
        ];
    }

    /** Submenú SERVICIO */
    public static function servicioMenu(): array
    {
        return [
            'Motores', 'Sistemas Hidráulicos', 'Toma de Fuerza', 'Transmisiones',
            'Grupos Electrógenos', 'Tableros Eléctricos', 'Luminarias',
            'Puesta a Tierra', 'Cámaras de Seguridad',
        ];
    }

    /** Submenú SOLUCIONES */
    public static function solucionesMenu(): array
    {
        return [
            'Motores Diesel', 'Transmisiones', 'Toma de Fuerza', 'Grupos Electrógenos',
            'Tableros para Motores', 'Excavadoras', 'Repuestos', 'Filtros',
            'Aceites', 'Refrigerantes',
        ];
    }

    /** Redes / accesos de la barra lateral flotante */
    public static function sidebar(): array
    {
        return [
            ['icon' => 'fas fa-shopping-cart', 'url' => '/tienda',                          'title' => 'Tienda',  'hover' => '#243e58'],
            ['icon' => 'fab fa-whatsapp',      'url' => 'https://wa.link/esako',             'title' => 'WhatsApp','hover' => '#25d366', 'blank' => true],
            ['icon' => 'fas fa-file-pdf',      'url' => '#',                                 'title' => 'Brochure','hover' => '#243e58'],
            ['icon' => 'fas fa-book',          'url' => '#',                                 'title' => 'Libro de Reclamaciones', 'hover' => '#243e58'],
            ['icon' => 'fab fa-youtube',       'url' => 'https://www.youtube.com/@esakoglobal','title'=>'YouTube','hover' => '#ff0000', 'blank' => true],
            ['icon' => 'fab fa-facebook-f',    'url' => 'https://www.facebook.com/esako',     'title' => 'Facebook','hover' => '#1877f2', 'blank' => true],
            ['icon' => 'fab fa-instagram',     'url' => 'https://www.instagram.com/esako.global','title'=>'Instagram','hover' => '#e1306c', 'blank' => true],
            ['icon' => 'fab fa-linkedin-in',   'url' => 'https://www.linkedin.com/in/esako-global-5b2090395','title'=>'LinkedIn','hover' => '#0a66c2', 'blank' => true],
            ['icon' => 'fab fa-tiktok',        'url' => 'https://www.tiktok.com/@esako71',    'title' => 'TikTok',  'hover' => '#010101', 'blank' => true],
        ];
    }

    /** Slides del hero de inicio */
    public static function heroSlides(): array
    {
        return [
            ['title' => 'POTENCIA:',  'sub' => 'MOTORES DIESEL.',          'img' => self::IMG . '2021/08/6.jpg'],
            ['title' => 'FUERZA:',    'sub' => 'GRUPOS ELECTRÓGENOS.',     'img' => self::IMG . '2025/10/7.jpg'],
            ['title' => 'PRECISIÓN:', 'sub' => 'SISTEMAS HIDRÁULICOS.',    'img' => self::IMG . '2025/10/4-2.jpg'],
        ];
    }

    /** Carrusel de productos del inicio (también usado como destacados) */
    public static function carousel(): array
    {
        return [
            ['title' => 'Motor Marino',            'img' => self::IMG . '2025/10/1-4.jpg'],
            ['title' => 'Motor Automotriz',        'img' => self::IMG . '2025/10/2-4.jpg'],
            ['title' => 'Motor Underground',       'img' => self::IMG . '2025/10/3-3.jpg'],
            ['title' => 'Motor Construcción',      'img' => self::IMG . '2025/10/4-3.jpg'],
            ['title' => 'Grupos Electrógenos',     'img' => self::IMG . '2025/10/7.jpg'],
            ['title' => 'Consumibles y Mangueras', 'img' => self::IMG . '2025/09/5.jpg'],
            ['title' => 'Sistemas Hidráulicos',    'img' => self::IMG . '2025/10/4-2.jpg'],
            ['title' => 'Excavadoras',             'img' => self::IMG . '2025/10/9.jpg'],
            ['title' => 'Motores Diesel',          'img' => self::IMG . '2021/08/6.jpg'],
            ['title' => 'Tableros Eléctricos',     'img' => self::IMG . '2025/10/8-1.jpg'],
            ['title' => 'Transmisiones',           'img' => self::IMG . '2025/10/9-1.jpg'],
            ['title' => 'Filtros y Repuestos',     'img' => self::IMG . '2025/10/11-768x768.jpg'],
        ];
    }

    /** Detalle de cada servicio (imagen + descripción) */
    public static function servicios(): array
    {
        return [
            ['t' => 'Motores',              'img' => self::IMG . '2021/08/6.jpg',      'desc' => 'Mantenimiento, reparación e instalación de motores diésel multimarca, con repotenciación y puesta a punto para máximo rendimiento.'],
            ['t' => 'Sistemas Hidráulicos', 'img' => self::IMG . '2025/10/4-2.jpg',    'desc' => 'Diagnóstico y reparación de bombas, cilindros, válvulas y mangueras hidráulicas, garantizando presión y respuesta óptimas.'],
            ['t' => 'Toma de Fuerza',       'img' => self::IMG . '2025/10/4-10.jpg',   'desc' => 'Instalación y mantenimiento de tomas de fuerza (PTO) para acoplar y operar equipos auxiliares con seguridad.'],
            ['t' => 'Transmisiones',        'img' => self::IMG . '2025/10/9-1.jpg',     'desc' => 'Servicio integral de transmisiones manuales y automáticas: ajuste, cambio de componentes y pruebas de funcionamiento.'],
            ['t' => 'Grupos Electrógenos',  'img' => self::IMG . '2025/10/7.jpg',       'desc' => 'Mantenimiento preventivo y correctivo de grupos electrógenos para asegurar energía continua y confiable.'],
            ['t' => 'Tableros Eléctricos',  'img' => self::IMG . '2025/10/8-1.jpg',     'desc' => 'Diseño, instalación y mantenimiento de tableros eléctricos y de control bajo estándares de seguridad.'],
            ['t' => 'Luminarias',           'img' => self::IMG . '2025/10/3-7.jpg',     'desc' => 'Instalación y mantenimiento de sistemas de iluminación industrial eficientes y de larga duración.'],
            ['t' => 'Puesta a Tierra',      'img' => self::IMG . '2025/10/1-29.jpg',    'desc' => 'Implementación y medición de sistemas de puesta a tierra para proteger a las personas y los equipos.'],
            ['t' => 'Cámaras de Seguridad', 'img' => self::IMG . '2025/10/5-5.jpg',     'desc' => 'Instalación y configuración de cámaras de seguridad y videovigilancia para tus instalaciones.'],
        ];
    }

    /** Paneles del hero de Servicio */
    public static function servicioPanels(): array
    {
        return [
            ['img' => self::IMG . '2025/10/2-4.jpg', 'lines' => ['SERVICIO TECNICO MULTIMARCA', 'DE MOTORES, TRANSMISIONES,', 'TOMA DE FUERZA Y MAS']],
            ['img' => self::IMG . '2025/10/7.jpg',   'lines' => ['SERVICIO TECNICO', 'MULTIMARCA DE GRUPOS', 'ELECTROGENOS']],
        ];
    }

    /** Detalle de cada solución (imagen + descripción) */
    public static function solucionesDetalle(): array
    {
        return [
            ['t' => 'Motores Diesel',        'img' => self::IMG . '2021/08/6.jpg',            'desc' => 'Venta de motores diésel multimarca, nuevos y repotenciados, para todo tipo de aplicación industrial.'],
            ['t' => 'Transmisiones',         'img' => self::IMG . '2025/10/9-1.jpg',          'desc' => 'Transmisiones y componentes para vehículos y maquinaria pesada, con garantía y soporte técnico.'],
            ['t' => 'Toma de Fuerza',        'img' => self::IMG . '2025/10/4-10.jpg',         'desc' => 'Tomas de fuerza (PTO) y kits de acople para operar equipos auxiliares de forma segura.'],
            ['t' => 'Grupos Electrógenos',   'img' => self::IMG . '2025/10/7.jpg',            'desc' => 'Grupos electrógenos de diferentes potencias para respaldo y operación continua de energía.'],
            ['t' => 'Tableros para Motores', 'img' => self::IMG . '2025/10/8-1.jpg',          'desc' => 'Tableros de control y transferencia automática para motores y grupos electrógenos.'],
            ['t' => 'Excavadoras',           'img' => self::IMG . '2025/10/9.jpg',            'desc' => 'Excavadoras y maquinaria pesada para proyectos de construcción y minería.'],
            ['t' => 'Repuestos',             'img' => self::IMG . '2025/09/5.jpg',            'desc' => 'Repuestos originales y alternativos para motores, transmisiones y equipos industriales.'],
            ['t' => 'Filtros',               'img' => self::IMG . '2025/10/11-768x768.jpg',   'desc' => 'Filtros de aceite, aire, combustible y separadores agua/combustible de alta eficiencia.'],
            ['t' => 'Aceites',               'img' => self::IMG . '2025/10/6-1-800x800.jpg',  'desc' => 'Aceites y lubricantes para motor, sistema hidráulico y transmisión de marcas líderes.'],
            ['t' => 'Refrigerantes',         'img' => self::IMG . '2025/10/5-800x800.jpg',    'desc' => 'Refrigerantes y anticongelantes para proteger el sistema de enfriamiento del motor.'],
        ];
    }

    /** Paneles del hero de Soluciones */
    public static function solucionesPanels(): array
    {
        return [
            ['img' => self::IMG . '2025/09/5.jpg',  'lines' => ['CONSUMIBLES', 'REPUESTOS', 'MANGUERAS']],
            ['img' => self::IMG . '2021/08/6.jpg',  'lines' => ['MOTORES', 'DIESEL']],
            ['img' => self::IMG . '2025/10/7.jpg',  'lines' => ['GRUPOS', 'ELECTRÓGENOS']],
            ['img' => self::IMG . '2025/10/9.jpg',  'lines' => ['EXCAVADORAS']],
        ];
    }

    /** Secciones de texto de Empresa */
    public static function empresa(): array
    {
        return [
            'sucursales' => ['Chimbote', 'Lima'],
            'mapa'       => self::IMG . '2025/10/mapadeesakofinal-1.webp',
            'nosotros'   => [
                'En <strong>ESAKO GLOBAL SAC</strong>, nos especializamos en proporcionar soluciones con mejor relación costo-beneficio.',
                'Nuestro portafolio está diseñado para optimizar su productividad, reducir tiempos de inactividad y asegurar la continuidad operativa de su negocio.',
                'Atendemos sectores como minería, pesca, agroindustria, construcción, automotriz, petróleo e industria en general.',
            ],
            'vision'     => 'Deseamos ser una empresa global, con prestigio, eficaz, que brinde soluciones integrales e innovadoras con los mejores estándares, que motive la admiración de nuestros colaboradores, clientes, proveedores y competidores.',
            'valores'    => 'Integridad - Seguridad - Diversidad – Responsabilidad ambiental – Vocacion de servicio',
            'contacto'   => 'esako@esako.com.pe',
        ];
    }

    /** Boletines / Cursos / Empleos de Oportunidades */
    public static function oportunidades(): array
    {
        return [
            'Boletines' => [
                ['t' => '15% de Descuento en Mantenimiento',   'img' => self::IMG . '2025/10/img-boletin-1-e1760470852962.jpg'],
                ['t' => 'Inspección del Sistema de Lubricación','img' => self::IMG . '2025/10/1-29.jpg'],
                ['t' => 'Análisis del Combustible',            'img' => self::IMG . '2025/10/2-25.jpg'],
                ['t' => 'Sistema de Refrigeración',            'img' => self::IMG . '2025/10/3-7.jpg'],
                ['t' => 'Limpieza de Filtros',                 'img' => self::IMG . '2025/10/3-12.jpg'],
                ['t' => 'Mantenimiento del Sistema de Escape', 'img' => self::IMG . '2025/10/5-4.webp'],
                ['t' => 'Revisión del Sistema de Arranque',    'img' => self::IMG . '2025/10/4-10.jpg'],
                ['t' => 'Inspección del Sistema de Inyección', 'img' => self::IMG . '2025/10/7.webp'],
                ['t' => 'Pruebas de Funcionamiento en Vacío',  'img' => self::IMG . '2025/10/5-5.jpg'],
            ],
            'Cursos' => [
                ['t' => 'Curso de Venta B2B', 'img' => self::IMG . '2025/10/4-7.jpg'],
            ],
            'Empleos' => [
                ['t' => 'Practicante Asistenta Comercial', 'img' => self::IMG . '2025/10/1-26.jpg'],
                ['t' => 'Asesor Comercial Experto',        'img' => self::IMG . '2025/10/2-22.jpg'],
                ['t' => 'Contador con Experiencia',        'img' => self::IMG . '2025/10/3-9.jpg'],
            ],
        ];
    }

    /** Categorías superiores de la tienda */
    public static function tiendaCategorias(): array
    {
        $ph = 'https://esako.com.pe/wp-content/uploads/woocommerce-placeholder-1024x1024.webp';
        return [
            ['label' => 'Automotriz',   'img' => self::IMG . '2025/10/2-4.jpg'],
            ['label' => 'Minería',      'img' => self::IMG . '2025/10/3-3.jpg'],
            ['label' => 'Agroindustria','img' => self::IMG . '2025/10/4-3.jpg'],
            ['label' => 'Pesca',        'img' => self::IMG . '2025/10/1-4.jpg'],
            ['label' => 'Construcción', 'img' => self::IMG . '2025/10/9.jpg'],
            ['label' => 'Petroleo',     'img' => self::IMG . '2025/10/1-2.jpg'],
            ['label' => 'Categoria1',   'img' => $ph],
            ['label' => 'Categoria 2',  'img' => $ph],
            ['label' => 'Equipos',      'img' => self::IMG . '2025/10/equipos-800x800.jpg'],
        ];
    }

    /** Categorías del sidebar de la tienda */
    public static function tiendaSidebarCats(): array
    {
        return ['Agroindustria','Automotriz','Categoria 2','Categoria1','Construcción','Equipos','Minería','Pesca','Petroleo'];
    }

    /** Productos de la tienda */
    public static function productos(): array
    {
        $acm = 'Automotriz, Construcción, Minería';
        $ac  = 'Automotriz, Construcción';
        return [
            ['t' => 'Aceite de Motor Diesel', 'cat' => $acm, 'precio' => 340.00, 'img' => self::IMG . '2025/10/6-1-800x800.jpg'],
            ['t' => 'Aceite de Motor Diesel', 'cat' => $acm, 'precio' => 330.00, 'img' => self::IMG . '2025/10/1-3-800x800.jpg'],
            ['t' => 'Aceite de Motor Diesel', 'cat' => $acm, 'precio' => 340.00, 'img' => self::IMG . '2025/10/3-800x800.jpg'],
            ['t' => 'Aceite de Motor Diesel', 'cat' => $acm, 'precio' => 360.00, 'img' => self::IMG . '2025/10/2-1-800x800.jpg'],
            ['t' => 'Aceite de Motor Diesel', 'cat' => $acm, 'precio' => 370.00, 'img' => self::IMG . '2025/10/4-800x800.jpg'],
            ['t' => 'Aceite de Motor Diesel', 'cat' => $acm, 'precio' => 83.00,  'img' => self::IMG . '2025/10/5-800x800.jpg'],
            ['t' => 'Base de Filtro Separador Agua / Combustible', 'cat' => $ac, 'precio' => 350.00, 'img' => self::IMG . '2025/10/7-2-768x768.jpg'],
            ['t' => 'Empaque de Cubiertas', 'cat' => $ac, 'precio' => 85.00,  'img' => self::IMG . '2025/10/8-3-768x768.jpg'],
            ['t' => 'Empaque de Cubiertas', 'cat' => $ac, 'precio' => 115.00, 'img' => self::IMG . '2025/10/10-768x768.jpg'],
            ['t' => 'Filtro Separador Agua / Combustible', 'cat' => $ac, 'precio' => 240.00, 'img' => self::IMG . '2025/10/11-768x768.jpg'],
            ['t' => 'Filtro Separador Agua / Combustible', 'cat' => $ac, 'precio' => 55.00,  'img' => self::IMG . '2025/10/13-768x768.jpg'],
            ['t' => 'Filtro Separador Agua / Combustible', 'cat' => $ac, 'precio' => 69.00,  'img' => self::IMG . '2025/10/14-768x768.jpg'],
        ];
    }

    /** Más vendidos (sidebar tienda) */
    public static function masVendidos(): array
    {
        return [
            ['t' => 'Refrigerante de Motor Diesel',        'precio' => 52.00,  'img' => self::IMG . '2025/10/5-800x800.jpg'],
            ['t' => 'Empaque de Cubiertas',                'precio' => 115.00, 'img' => self::IMG . '2025/10/8-3-768x768.jpg'],
            ['t' => 'Filtro Separador Agua / Combustible', 'precio' => 240.00, 'img' => self::IMG . '2025/10/11-768x768.jpg'],
        ];
    }
}
