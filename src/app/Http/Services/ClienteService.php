<?php

namespace App\Http\Services;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Http\Resources\ClienteResource;


class ClienteService {
    public function getAll () {
        $clientes = Cliente::all();

        return ClienteResource::collection($clientes);
    }

    public function findById  ( $id ) {
        $cliente = Cliente::findOrFail( $id );

        return new ClienteResource( $cliente );
    }

    public function create ( ClienteRequest $request ) {
        Cliente::create( $request->validated() );
    }

    public function edit ( ClienteRequest $request, $id ) {
        $cliente = Cliente::findOrFail( $id  );

        $cliente->update( $request->validated() );
    }

    public function remove ( $id ) {
        $cliente = Cliente::findOrFail( $id );

        $cliente->delete();
    }

}