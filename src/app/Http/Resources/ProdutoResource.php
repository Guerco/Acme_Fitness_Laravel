<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
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
            'nome' => $this->nome,
            'imagem_path' => $this->imagem_path,
            'descricao' => $this->descricao,
            'data_cadastro' => $this->data_cadastro,
            'categoria' => new CategoriaResource($this->whenLoaded('categoria')),
        ];
    }
}
