<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Route;
use Controllers\BlogController;
use Controllers\HomeController;
use Controllers\LoginController;
use Controllers\VendedorController;
use Controllers\PropiedadController;

// Rutas de propiedades

Route::get('/admin', [PropiedadController::class, 'index']);
Route::get('/propiedades/crear', [PropiedadController::class, 'create']);
Route::post('/propiedades/store', [PropiedadController::class, 'store']);
Route::get('/propiedades/actualizar', [PropiedadController::class, 'edit']);
Route::post('/propiedades/update', [PropiedadController::class, 'update']);
Route::post('/propiedades/destroy', [PropiedadController::class, 'destroy']);

// Rutas de vendedores

Route::get('/vendedores/crear', [VendedorController::class, 'create']);
Route::post('/vendedores/guardar', [VendedorController::class, 'store']);
Route::get('/vendedores/editar', [VendedorController::class, 'edit']);
Route::post('/vendedores/actualizar', [VendedorController::class, 'update']);
Route::post('/vendedores/eliminar', [VendedorController::class, 'destroy']);

// Rutas blogs

Route::get('/blogs/crear', [BlogController::class, 'create']);
Route::post('/blogs/store', [BlogController::class, 'store']);
Route::get('/blogs/editar', [BlogController::class, 'edit']);
Route::post('/blogs/update', [BlogController::class, 'update']);
Route::post('/blogs/destroy', [BlogController::class, 'destroy']);


// Rutas paginas generales

Route::get('/', [HomeController::class, 'index']);
Route::get('/nosotros', [HomeController::class, 'nosotros']);
Route::get('/contacto', [HomeController::class, 'contacto']);
Route::get('/anuncios', [HomeController::class, 'anuncios']);
Route::get('/anuncio', [HomeController::class, 'anuncio']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/entrada', [HomeController::class, 'entrada']);
Route::post('/contacto', [HomeController::class, 'contacto']);

// Login y autenticacion

Route::get('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'login']);

Route::comprobarRutas();
