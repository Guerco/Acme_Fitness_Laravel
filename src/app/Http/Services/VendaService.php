<?php

namespace App\Http\Services;

use App\Exceptions\DescontoMaiorQueTotalException;
use App\Exceptions\EstoqueInsuficienteExcepetion;
use App\Http\Requests\VariacaoRequest;
use App\Http\Requests\VendaRequest;
use App\Models\Variacao;
use App\Models\Venda;
use App\Http\Resources\VendaResource;
use Illuminate\Support\Facades\DB;


class VendaService {
    public function getAll () {
        $variacoes = Venda::with('cliente', 'endereco', 'variacoes')->get();

        return VendaResource::collection($variacoes);
    }

    public function findById  ( $id ) {
        $variacao = Venda::with('cliente', 'endereco', 'variacoes')->findOrFail( $id );


        return new VendaResource( $variacao );
    }

    public function create ( VendaRequest $request ) {
        DB::transaction(function () use ( $request ) {
            $dados = $request->validated();
            
            $dados['variacoes'] = $this->unificaVariacoesRepetidas(
                $dados['variacoes']
            );

            $dados['valor_frete'] = config('regras_de_negocio.valor_frete');

            $dados['descontos'] = $dados['descontos'] ?? 0;

            $this->checarEstoqueDiponivelVariacoes( $dados['variacoes'] );
    
            $dados['valor_total'] = $this->calcularValorTotal(
                $dados['variacoes'],
                $dados['valor_frete'],
                $dados['descontos']
            );

            $dados['cliente_id'] = $dados['cliente']['id'];
            $dados['endereco_id'] = $dados['endereco']['id'];
            
            $venda = Venda::create($dados);
    
            foreach( $dados['variacoes'] as $v ) {
                $venda->variacoes()->attach(
                    $v['variacao']['id'],
                    [
                        'quantidade' => $v['quantidade']
                    ],
                );
    
                $this->atualizarEstoqueVariacao($v );
            }
        });
    }
    
    public function edit ( VariacaoRequest $request, $id ) {
        //
    }

    public function remove ( $id ) {
        $variacao = Venda::findOrFail( $id );

        $variacao->delete();
    }

    private function unificaVariacoesRepetidas( $variacoes ) {
        $unificados = [];
        
        foreach ( $variacoes as $v ) {
            $id = $v['variacao']['id'];
            
            if ( ! isset( $unificados[ $id ]) ) {
                $unificados[ $id ] = $v['quantidade'];
            } else {
                $unificados[ $id ] += $v['quantidade'];
            }
        }

        $variacoes = [];

        foreach( $unificados as $id => $quantidade ) {
            $variacoes[] = [
                'variacao' => [ 'id' => $id ],
                'quantidade' => $quantidade
            ];
        }

        return $variacoes;
    }

    private function checarEstoqueDiponivelVariacoes( $variacoes ) {
        foreach ( $variacoes as $v ) {
            $variacao = Variacao::findOrFail($v['variacao']['id']);

            if ( $v['quantidade'] > $variacao->estoque ) {
                throw new EstoqueInsuficienteExcepetion();
            }
        }

    }

    private function calcularValorTotal( $variacoes, $valor_frete, $descontos ) {
        $valor_total = 0;
        
        foreach ( $variacoes as $p ) {
            $preco = Variacao::where('id', $p['variacao']['id'])->value('preco');
            
            $valor_item = $p['quantidade'] * $preco;
            $valor_total += $valor_item;
        }

        if ( $descontos > $valor_total ) {
            throw new DescontoMaiorQueTotalException();
        }

        $valor_total += ( $valor_frete - $descontos );

        return $valor_total;
    }

    private function atualizarEstoqueVariacao ( $v ) {
        $variacao = Variacao::findOrFail( $v['variacao']['id'] );

        $variacao->estoque = ( $variacao->estoque - $v['quantidade'] );

        $variacao->save();
    }
    
}