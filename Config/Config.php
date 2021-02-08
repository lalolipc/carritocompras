<?php namespace Config;

#Route Path Strings
define('ROOT', dirname(__DIR__) . "/");

define("FRONT_ROOT", "/GocellaCarrito");

define("URL_THEME", "Vistas/");

define("URL_CSS", URL_THEME . "css");

define("URL_JS", URL_THEME . "js");

define("URL_CTRL", "Controladores/");

define("URL_IMG", URL_CTRL . "images/");

#Connection Strings
define('DB_HOST', 'localhost');
define('DB_NAME', 'Carrito');
define('DB_USER', 'root');
define('DB_PASS', 'root');