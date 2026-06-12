# esako-prueba — PHP MVC

Sitio de ESAKO reconstruido con **arquitectura PHP MVC** (sin frameworks externos),
listo para desplegar en cPanel/Apache.

## Arquitectura

```
index.php                  Front Controller (único punto de entrada)
.htaccess                  URLs limpias hacia index.php + caché + gzip
config/
  routes.php               Tabla de rutas  (ruta → Controlador@método)
app/
  Core/
    Router.php             Enrutador
    Controller.php         Controlador base (helper view())
    View.php               Motor de vistas (layout + escape + helpers)
  Controllers/             Un controlador por página
  Models/
    SiteData.php           Origen de datos (catálogo, menús, secciones)
  Views/
    layouts/main.php       Plantilla común (nav, idioma, sidebar, footer)
    home / empresa / ...    Vista de cada página
    errors/404.php
assets/
  css/styles.css           Estilos
  js/app.js                Slider, carrusel, menú móvil, ES/EN
```

## Flujo de una petición

1. Apache envía todo a `index.php` (vía `.htaccess`).
2. El **Router** busca la ruta en `config/routes.php` y resuelve `Controlador@método`.
3. El **Controlador** pide datos al **Modelo** (`SiteData`) y llama a `view()`.
4. La **Vista** se renderiza dentro de `layouts/main.php` y se envía al navegador.

## Rutas

| URL              | Controlador            |
|------------------|------------------------|
| `/`              | HomeController         |
| `/empresa`       | EmpresaController      |
| `/servicio`      | ServicioController     |
| `/soluciones`    | SolucionesController   |
| `/oportunidades` | OportunidadesController|
| `/tienda`        | TiendaController       |

## Ejecutar en local

```bash
php -S 127.0.0.1:8090 index.php
# abrir http://127.0.0.1:8090
```

## Desplegar en cPanel

Subir todo a la raíz del dominio. Requiere **PHP 7.4+** y `mod_rewrite`.
La carpeta `legacy/` (versión estática anterior) no se sube.

## Características

- Menú responsive con **hamburguesa** en móvil.
- **Selector de idioma 🇪🇸/🇬🇧** (Google Translate).
- **Botón flotante de WhatsApp**.
- Caché de assets y compresión GZIP vía `.htaccess`.
