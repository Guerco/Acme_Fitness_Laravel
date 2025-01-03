<?php

namespace App\Http\Services;

use App\Models\Cliente;
use App\Http\Resources\ClienteResource;
use Illuminate\Foundation\Http\FormRequest;


class ClienteService {
    public function getAll () {
        $clientes = Cliente::all();

        return ClienteResource::collection($clientes);
    }

    public function findById  ( $id ) {
        $cliente = Cliente::find( $id );

        return new ClienteResource( $cliente );
    }

    public function create ( FormRequest $request ) {
        Cliente::create( $request->validated() );
    }

    public function edit ( FormRequest $request, $id ) {
        $cliente = Cliente::findOrFail( $id  );

        $cliente->update( $request->validated() );
    }

    public function remove ( $id ) {
        $cliente = Cliente::findOrFail( $id );

        $cliente->delete();
    }

}