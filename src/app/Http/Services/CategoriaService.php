<?php

namespace App\Http\Services;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use App\Http\Resources\CategoriaResource;


class CategoriaService  {

    public function getAll () {
        $categorias = Categoria::all();

        return CategoriaResource::collection($categorias);
    }

    public function findById  ( $id ) {
        $categoria = Categoria::find( $id );

        return new CategoriaResource( $categoria );
    }

    public function create ( CategoriaRequest $request ) {
        Categoria::create( $request->validated() );
    }

    public function edit ( CategoriaRequest $request, $id ) {
        $categoria = Categoria::findOrFail( $id  );

        $categoria->update( $request->validated() );
    }

    public function remove ( $id ) {
        $categoria = Categoria::findOrFail( $id );

        $categoria->delete();
    }

}