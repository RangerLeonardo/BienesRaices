<?php 

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__. "/../includes/app.php";

use Controllers\LoginController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedoresController;
use Controllers\PaginasController;

$router= new Router();


//cuando entramos a la página nosotros hacemos una conexión de tipo get, así que aplica una función

//cuando estemos en la pagina /admin, busca el controlador con la funcion llamada "index"
// CODIGO PARA PROPIEDADES--------------------------------------------------------------------------------------------

$router->get("/admin", [PropiedadController::class, "index"]);

$router->get("/propiedades/crear", [PropiedadController::class, "crear"]);
$router->post("/propiedades/crear", [PropiedadController::class, "crear"]);

$router->get("/propiedades/actualizar", [PropiedadController::class, "actualizar"]);
$router->post("/propiedades/actualizar", [PropiedadController::class, "actualizar"]);

$router->post("/propiedades/eliminar", [PropiedadController::class, "eliminar"]);

// CODIGO PARA VENDEDORES--------------------------------------------------------------------------------------------
$router->get("/vendedores/crear", [VendedoresController::class, "crear"]);
$router->post("/vendedores/crear", [VendedoresController::class, "crear"]);

$router->get("/vendedores/actualizar", [VendedoresController::class, "actualizar"]);
$router->post("/vendedores/actualizar", [VendedoresController::class, "actualizar"]);

$router->post("/vendedores/eliminar", [VendedoresController::class, "eliminar"]);


// CODIGO PARA VISITANTES--------------------------------------------------------------------------------------------

$router->get("/",[PaginasController::class,"index"]);
$router->get("/nosotros",[PaginasController::class,"nosotros"]);
$router->get("/propiedades",[PaginasController::class,"propiedades"]);
$router->get("/propiedad",[PaginasController::class,"propiedad"]);
$router->get("/blog",[PaginasController::class,"blog"]);
$router->get("/entrada",[PaginasController::class,"entrada"]);
$router->get("/contacto",[PaginasController::class,"contacto"]);
$router->post("/contacto",[PaginasController::class,"contacto"]);

//lOGIN Y AUTENTICACIÓN
$router->get("/login", [LoginController::class,"login"]);
$router->post("/login", [LoginController::class,"login"]);
$router->get("/logout", [LoginController::class,"logout"]);








$router->comprobarRutas();