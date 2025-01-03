<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ClienteController;


Route::apiResource( 'categorias',  CategoriaController::class)->only (
    [
        'index', 
        'show', 
        'store', 
        'update', 
        'destroy',
    ]
);

Route::apiResource( 'clientes',  ClienteController::class)->only (
    [
        'index', 
        'show', 
        'store', 
        'update', 
        'destroy',
    ]
);