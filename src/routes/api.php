<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaController;


Route::apiResource( 'categorias',  CategoriaController::class)->only (
    [
        'index', 
        'show', 
        'store', 
        'update', 
        'destroy',
    ]
);

