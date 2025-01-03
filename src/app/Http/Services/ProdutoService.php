<?php

namespace App\Http\Services;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use App\Http\Resources\ProdutoResource;


class ProdutoService {
    public function getAll () {
        $produtos = Produto::with('categoria')->get();

        return ProdutoResource::collection($produtos);
    }

    public function findById  ( $id ) {
        $produto = Produto::with('categoria')->findOrFail( $id );

        return new ProdutoResource( $produto );
    }

    public function create ( ProdutoRequest $request ) {
        $dados = $request->validated();
        $dados['categoria_id'] = $request['categoria']['id'];
        
        $dados['data_cadastro'] = $dados['data_cadastro'] ?? today();

        Produto::create( $dados);
    }
    
    public function edit ( ProdutoRequest $request, $id ) {
        $produto = Produto::findOrFail( $id  );

        $dados = $request->validated();
        if (isset($request['categoria']['id'])) {
            $dados['categoria_id'] = $request['categoria']['id'];
        }

        $produto->update( $dados );
    }

    public function remove ( $id ) {
        $produto = Produto::findOrFail( $id );

        $produto->delete();
    }

}