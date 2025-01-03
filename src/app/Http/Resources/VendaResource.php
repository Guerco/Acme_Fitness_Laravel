<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'valor_total' => $this->valor_total,
            'valor_frete' => $this->valor_frete,
            'descontos' => $this->descontos,
            'forma_pagamento' => $this->forma_pagamento,
            'endereco' => new EnderecoResource($this->whenLoaded('endereco')),
            'cliente' => new ClienteResource($this->whenLoaded('cliente')),
            
            'variacoes' => $this->getVariacoes(),
        ];
    }

    private function getVariacoes(){
        
        return $this->whenLoaded(
            'variacoes',
            $this->variacoes->map( function ($variacao)  {
                return [
                    'variacao' => new VariacaoResource($variacao) ,
                    'quantidade' => $variacao->pivot->quantidade
                ];
            }),
            []
        );
        
    }
}
