<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Http\Services\CategoriaService;
use Illuminate\Foundation\Http\FormRequest;

class ControllerBase
{
    private $service;

    public function __construct ( $service ) {
        $this->service = $service;
    }
    
    public function _index()
    {
        $dados = $this->service->getAll();

        return $this->gerarResponse('index', $dados);
    }

    public function _store( $request)
    {
        $this->service->create( $request );

        return $this->gerarResponse('store');
    }

    public function _show( $id )
    {
        $dados = $this->service->findById( $id );

        return $this->gerarResponse('show', $dados );
    }

    public function _update( $request, $id )
    {
        $this->service->edit( $request , $id );

        return $this->gerarResponse('update');
    }

    public function _destroy( $id )
    {
        $this->service->remove( $id );

        return $this->gerarResponse( 'destroy' );
    }

    private function gerarResponse( $metodo  , $dados = null ) {
        switch ( $metodo ) {
            case 'index':
                return response()->json(
                    $dados ,
                    200 , 
                    [] ,
                    JSON_PRETTY_PRINT
                );
            case 'store':
                return response()->json(
                    [
                        'message' => 'Criado.',
                    ] ,
                    201 , 
                    [] ,
                    JSON_PRETTY_PRINT
                );
            case 'show':
                return response()->json(
                    $dados ,
                    200 , 
                    [] ,
                    JSON_PRETTY_PRINT
                );
            case 'update':
                return response()->json(
                    [
                        'message' => 'Alterado.',
                    ] ,
                    200 , 
                    [] ,
                    JSON_PRETTY_PRINT
                );
            case 'destroy':
                return response()->json(
                    [
                        'message' => 'Excluido.',
                    ] ,
                    200 , 
                    [] ,
                    JSON_PRETTY_PRINT
                );
            default:
                break;
        }
    }
}
