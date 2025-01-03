<?php

namespace App\Http\Services;

use App\Http\Requests\VariacaoRequest;
use App\Models\Variacao;
use App\Http\Resources\VariacaoResource;

class VariacaoService {
    public function getAll () {
        $variacoes = Variacao::with('produto')->get();

        return VariacaoResource::collection($variacoes);
    }

    public function findById  ( $id ) {
        $variacao = Variacao::with('produto')->findOrFail( $id );

        return new VariacaoResource( $variacao );
    }

    public function create ( VariacaoRequest $request ) {
        $dados = $request->validated();
        $dados['produto_id'] = $request['produto']['id'];
        
        Variacao::create( $dados);
    }
    
    public function edit ( VariacaoRequest $request, $id ) {
        $variacao = Variacao::findOrFail( $id  );

        $dados = $request->validated();
        if (isset($request['produto']['id'])) {
            $dados['produto_id'] = $request['produto']['id'];
        }

        $variacao->update( $dados );
    }

    public function remove ( $id ) {
        $variacao = Variacao::findOrFail( $id );

        $variacao->delete();
    }

}