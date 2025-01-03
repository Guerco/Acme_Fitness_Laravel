<?php

namespace Tests\Feature;
use PHPUnit\Framework\Attributes\Group; 

use Tests\TestCase;

class GetVariacaoTest extends TestCase
{
    #[Group('http')]
    #[Group('variacoes')]
    #[Group('get')]
    public function test_get_variacoes_returns_a_successful_response(): void
    {
        $response = $this->get('/api/variacoes/');
 
        // $response->dump(); // Imprime as entidades retornadas

        $response->assertStatus(200);
    }
}
