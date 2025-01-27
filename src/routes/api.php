<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\EnderecoController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\VariacaoController;
use App\Http\Controllers\Api\VendaController;


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

Route::apiResource( 'enderecos',  EnderecoController::class)->only (
    [
        'index', 
        'show', 
        'store', 
        'update', 
        'destroy',
    ]
);

Route::apiResource( 'produtos',  ProdutoController::class)->only (
    [
        'index', 
        'show', 
        'store', 
        'update', 
        'destroy',
    ]
);

Route::apiResource( 'variacoes',  VariacaoController::class)->only (
    [
        'index', 
        'show', 
        'store', 
        'update', 
        'destroy',
    ]
);

Route::apiResource( 'vendas',  VendaController::class)->only (
    [
        'index', 
        'show', 
        'store', 
        'destroy',
    ]
);