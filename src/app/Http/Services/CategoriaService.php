<?php

namespace App\Http\Services;

use App\Models\Categoria;
use App\Http\Resources\CategoriaResource;
use Illuminate\Foundation\Http\FormRequest;


class CategoriaService  {

    public function getAll () {
        $categorias = Categoria::all();

        return CategoriaResource::collection($categorias);
    }

    public function findById  ( $id ) {
        $categoria = Categoria::find( $id );

        return new CategoriaResource( $categoria );
    }

    public function create ( FormRequest $request ) {
        Categoria::create( $request->validated() );
    }

    public function edit ( FormRequest $request, $id ) {
        $categoria = Categoria::findOrFail( $id  );

        $categoria->update( $request->validated() );
    }

    public function remove ( $id ) {
        $categoria = Categoria::findOrFail( $id );

        $categoria->delete();
    }

}