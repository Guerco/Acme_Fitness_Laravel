<?php

namespace App\Exceptions;

use Exception;

class EstoqueInsuficienteException extends Exception
{
    public function render() {
        return response () -> json (
            [
                'message' => 'Estoque insuficiente para a variação selecionada.'
            ],
            422,
            [],
            JSON_PRETTY_PRINT
        ) ;
    }
}
