<?php

namespace App\Exceptions;

use Exception;

class DescontoMaiorQueTotalException extends Exception
{
    public function render() {
        return response () -> json (
            [
                'message' => 'Desconto maior que o valor total da venda.'
            ],
            422,
            [],
            JSON_PRETTY_PRINT
        ) ;
    }
}
