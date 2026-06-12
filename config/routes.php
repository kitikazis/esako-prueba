<?php

declare(strict_types=1);

/**
 * Tabla de rutas.  ruta  =>  "Controlador@metodo"
 * @var \App\Core\Router $router
 */

$router->add('/',              'HomeController@index');
$router->add('/empresa',       'EmpresaController@index');
$router->add('/servicio',      'ServicioController@index');
$router->add('/soluciones',    'SolucionesController@index');
$router->add('/oportunidades', 'OportunidadesController@index');
$router->add('/tienda',        'TiendaController@index');

$router->setNotFound('HomeController@notFound');
