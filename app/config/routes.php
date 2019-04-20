<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'frontend/dinamic/dashboard';


// --------------------- componente historias ---------------------

$route['historia'] = 'frontend/dinamic/dashboard';

$route['en-construccion'] = 'frontend/dinamic/dashboard';

$route['historia/:contenido'] = 'frontend/dinamic/dashboard';

$route['noticias'] = 'frontend/dinamic/dashboard';

$route['noticias/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['noticias/categoria/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['noticias/etiqueta/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['noticias/ciudad/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['info-aula-virtual'] = 'frontend/dinamic/dashboard';

$route['aula-virtual'] = 'frontend/dinamic/dashboard';

$route['aula-virtual/detalle-curso/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['aula-virtual/curso/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['aula-virtual/curso/modulo/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['ciudades'] = 'frontend/dinamic/dashboard';

$route['ciudades/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['comunicacion'] = 'frontend/dinamic/dashboard';

$route['comunicacion/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['educacion'] = 'frontend/dinamic/dashboard';

$route['educacion/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['poblaciones'] = 'frontend/dinamic/dashboard';

$route['estadisticas'] = 'frontend/dinamic/dashboard';

$route['ssp'] = 'frontend/dinamic/dashboard';

$route['flujo-proceso'] = 'frontend/dinamic/dashboard';

$route['poblaciones/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['ingresar'] = 'frontend/dinamic/dashboard';
$route['ingreso-registro'] = 'frontend/dinamic/dashboard';
$route['fullscreen'] = 'frontend/dinamic/dashboard';
$route['blog'] = 'frontend/dinamic/dashboard';
$route['preguntas-frecuentes'] = 'frontend/dinamic/dashboard';
$route['eventos'] = 'frontend/dinamic/dashboard';
$route['cambiar-password'] = 'frontend/dinamic/dashboard';

$route['busquedas'] = 'frontend/dinamic/dashboard';

$route['sobre-nosotros'] = 'frontend/dinamic/dashboard';

$route['contactanos'] = 'frontend/dinamic/dashboard';

$route['normativas'] = 'frontend/dinamic/dashboard';

$route['convocatorias'] = 'frontend/dinamic/dashboard';

$route['convocatorias/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['difusiones'] = 'frontend/dinamic/dashboard';

$route['difusiones/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['gestiones'] = 'frontend/dinamic/dashboard';

$route['gestiones/([0-9]+)/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';

$route['denuncia'] = 'frontend/dinamic/dashboard';

$route['denuncia-migrantes'] = 'frontend/dinamic/dashboard';

$route['denuncia-salud'] = 'frontend/dinamic/dashboard';

$route['equipo-trabajo'] = 'frontend/dinamic/dashboard';

$route['informes'] = 'frontend/dinamic/dashboard';

$route['mi-perfil'] = 'frontend/dinamic/dashboard';

$route['esquema-organizacional'] = 'frontend/dinamic/dashboard';

$route["inicio"] = 'frontend/dinamic/dashboard';


//
//$route['historia'] = 'frontend/dinamic/dashboard';
//$route['noticias'] = 'frontend/dinamic/dashboard';
//$route['noticias/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';
//
//$route['ingresar'] = 'frontend/dinamic/dashboard';
//$route['ingreso-registro'] = 'frontend/dinamic/dashboard';
//$route['inicio'] = 'frontend/dinamic/dashboard';
//$route['corporate'] = 'frontend/dinamic/dashboard';
//$route['fullscreen'] = 'frontend/dinamic/dashboard';
//$route['blog'] = 'frontend/dinamic/dashboard';
//$route['blog/([a-zA-Z].+)'] = 'frontend/dinamic/dashboard';
//$route['sobre-nosotros'] = 'frontend/dinamic/dashboard';
//$route['contactanos'] = 'frontend/dinamic/dashboard';
//$route['preguntas-frecuentes'] = 'frontend/dinamic/dashboard';
//$route['denuncia'] = 'frontend/dinamic/dashboard';
//$route['denuncia-migrantes'] = 'frontend/dinamic/dashboard';
//$route['denuncia-salud'] = 'frontend/dinamic/dashboard';
//$route['eventos'] = 'frontend/dinamic/dashboard';
//$route['equipo-trabajo'] = 'frontend/dinamic/dashboard';
//$route['portafolio'] = 'frontend/dinamic/dashboard';
//$route['ciudades'] = 'frontend/dinamic/dashboard';
//$route['estadisticas'] = 'frontend/dinamic/dashboard';
//$route['esquema-organizacional'] = 'frontend/dinamic/dashboard';
//
//$route['historia'] = 'frontend/dinamic/dashboard';
//$route['historia/:id'] = 'frontend/dinamic/dashboard';
//$route['noticias'] = 'frontend/dinamic/dashboard';
//$route['noticias/:id'] = 'frontend/dinamic/dashboard';
//
//$route['ingresar'] = 'frontend/dinamic/dashboard';
//$route['ingreso-registro'] = 'frontend/dinamic/dashboard';
//$route['fullscreen'] = 'frontend/dinamic/dashboard';
//$route['blog'] = 'frontend/dinamic/dashboard';
//$route['preguntas-frecuentes'] = 'frontend/dinamic/dashboard';
//$route['eventos'] = 'frontend/dinamic/dashboard';
//$route['cambiar-password'] = 'frontend/dinamic/dashboard';
//$route['busquedas'] = 'frontend/dinamic/dashboard';
//
//$route['archivos'] = 'frontend/dinamic/dashboard';
//$route['sobre-nosotros'] = 'frontend/dinamic/dashboard';
//$route['contactanos'] = 'frontend/dinamic/dashboard';
//$route['denuncia'] = 'frontend/dinamic/dashboard';
//$route['denuncia-migrantes'] = 'frontend/dinamic/dashboard';
//$route['denuncia-salud'] = 'frontend/dinamic/dashboard';
//
//$route['ciudades'] = 'frontend/dinamic/dashboard';
//$route['equipo-trabajo'] = 'frontend/dinamic/dashboard';
//$route['estadisticas'] = 'frontend/dinamic/dashboard';
//
//$route['esquema-organizacional'] = 'frontend/dinamic/dashboard';
//
//$route['migrantes'] = 'frontend/dinamic/dashboard';
//$route['personas-adultas-mayores'] = 'frontend/dinamic/dashboard';
//
//$route['diversidades-sexuales-y-generos'] = 'frontend/dinamic/dashboard';
//$route['mujeres'] = 'frontend/dinamic/dashboard';
//$route['indigenas-y-pueblo-afroboliviano'] = 'frontend/dinamic/dashboard';
//$route['niñez-y-adolecencia'] = 'frontend/dinamic/dashboard';
//
//$route['personas-con-discapacidad'] = 'frontend/dinamic/dashboard';
//$route['personas-privadas-de-libertad'] = 'frontend/dinamic/dashboard';
//$route['info-aula-virtual'] = 'frontend/dinamic/dashboard';
//$route['aula-virtual'] = 'frontend/dinamic/dashboard';
//$route["inicio"] = 'frontend/dinamic/dashboard';


/*
|
| Paginas Estaticas para el administrador del sistema
| de la Defensoria del Pueblo
|
*/
$route['admin'] = 'backend/admin/dashboard';
$route['admin/dashboard'] = 'backend/admin/dashboard';

$route['base'] = 'backend/base/dashboard';
$route['base/dashboard'] = 'backend/base/dashboard';

/*
|
| Paginas estaticas para el administrador del sistema
| de desarrollo Estic
|
*/

$route['sys/ajax/remove/([a-zA-Z]+)/([a-zA-Z].+)'] = 'sys/ajax/remove/$1/$2';

$route['sys/ajax/([a-zA-Z]+)/([a-zA-Z].+)'] = 'sys/ajax/export/$1/$2';
$route['sys/ajax/([a-zA-Z]+)/([a-zA-Z].+)/([a-zA-Z].+)'] = 'sys/ajax/export/$1/$2/$3';
$route['sys/ajax/([a-zA-Z]+)/([a-zA-Z].+)/([a-zA-Z].+)/([0-9]+)'] = 'sys/ajax/export/$1/$2/$3';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route["login"]["get"] = "auth/login";
//$route["login"]["post"] = "auth/process_login";

$route["register"]["get"] = "auth/register";
$route["register"]["post"] = "auth/process_register";

$route["logout"]["get"] = "auth/logout";
$route['translate_uri_dashes'] = FALSE;


/*
|
| Contenido de la vistas virtuales
|
|
*/
$route['admin/contenido_web/edit/(:num)'] = 'admin/publicaciones/edit_contenido_web/$1';
$route['admin/contenido_web/edit'] = 'admin/publicaciones/edit_contenido_web';
$route['admin/contenido_web/index'] = 'admin/publicaciones/index_contenido_web';
$route['admin/contenido_web'] = 'admin/publicaciones/index_contenido_web';