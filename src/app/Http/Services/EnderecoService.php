<?php

namespace App\Http\Services;

use App\Http\Requests\EnderecoRequest;
use App\Models\Endereco;
use App\Http\Resources\EnderecoResource;


class EnderecoService {
    public function getAll () {
        $enderecos = Endereco::all();

        return EnderecoResource::collection($enderecos);
    }

    public function findById  ( $id ) {
        $endereco = Endereco::find( $id );

        return new EnderecoResource( $endereco );
    }

    public function create ( EnderecoRequest $request ) {
        Endereco::create( $request->validated() );
    }

    public function edit ( EnderecoRequest $request, $id ) {
        $endereco = Endereco::findOrFail( $id  );

        $endereco->update( $request->validated() );
    }

    public function remove ( $id ) {
        $endereco = Endereco::findOrFail( $id );

        $endereco->delete();
    }

}