<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VariacaoResource extends JsonResource
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
            'tamanho' => $this->tamanho,
            'peso' => $this->peso,
            'cor' => $this->cor,
            'preco' => $this->preco,
            'estoque' => $this->estoque,
            'produto' => new ProdutoResource($this->whenLoaded('produto')),
        ];
    }
}
