
# Validação

A validação dos dados é fornecida pelas [FormRequests](/src/app/Http/Requests/), implementadas para cada entidade.

- Ex: [VendaRequest](/src/app/Http/Requests/VendaRequest.php)
```php
public function rules(): array
{
    $rules = [
        'descontos' => [
            'nullable' ,
            'numeric' ,      
            'decimal:0,2' ,
            'min:0.01',
        ] ,
        'forma_pagamento' => [
        ],
        
        'cliente.id' => [
            'exists:cliente,id' ,
        ] ,
        'endereco.id' => [
            'exists:endereco,id' ,
        ] ,

        'variacoes' => [
            'min:1'
        ],
        'variacoes.*.variacao.id' => [
            'exists:variacao,id' ,
        ],
        'variacoes.*.quantidade' => [
            'min:1' ,
        ] ,
    ];
    
    return $rules;
}
```
---

## Regras de Validação

---

### Categoria
`1. nome`
- Obrigatório
- Máximo de 50 caracteres

---

###  Cliente
`1. nome`
- Obrigatório
- Máximo de 50 caracteres

`2. cpf`
- Obrigatório
- Formato XXX.XXX.XXX-XX

`3. data_nascimento`
- Obrigatório
- Data Válida
- Formato AAAA-mm-dd            

---

### Endereco
`1. logradouro`
- Obrigatório
- Máximo de 50 caracteres

`2. cidade`
- Obrigatório
- Máximo de 50 caracteres

`3. bairro`
- Obrigatório
- Máximo de 50 caracteres

`4. numero`
- Obrigatório

`5. cep`
- Obrigatório
- Formato XXXXX-XXX

`6. complemento`
- Máximo de 50 caracteres

---

### Produto
`1. nome`
- Obrigatório
- Máximo de 50 caracteres

`2. imagem_path` 
- Máximo de 200 caracteres
            
`3. data_cadastro`
- Data Válida
- Formato AAAA-mm-dd            
            
`4. categoria id`
- Obrigatório
- Inteiro
- Existente no banco

---

### Variacao
`1. tamanho`
- Máximo de 50 caracteres

`2. peso`
- Máximo de 50 caracteres

`3. cor`
- Máximo de 50 caracteres

`4. preco`
- Obrigatório
- Numérico
- Decimal até 2 casas, separadas por '.'
- Mínimo de 0.01

`5. estoque`
- Obrigatório
- Numérico            
- Mínimo de 0            

`6. produto id`
- Obrigatório
- Inteiro
- Existente no banco

---

### Venda
`1. descontos`
- Numérico
- Decimal até 2 casas, separadas por '.'
- Mínimo de 0.01

`2. forma_pagamento`
- Obrigatório
- PIX | Boleto | Cartão (1x)  

`3. cliente id`
- Obrigatório
- Inteiro
- Existente no banco
            
`4. endereco id`
- Obrigatório
- Inteiro
- Existente no banco
           
`5. variacoes`
- Obrigatóri
- Array
- Mínimo um elemento

`6. variacoes variacao id` 
- Obrigatório
- Inteiro
- Existente no banco
            
`7. variacoes variacao quantidade`
- Obrigatório
- Inteiro
- Mínimo 1
- Menor que o estoque disponível
        
--- 
---

Para mais informações sobre o projeto *[veja aqui](/README.md)*

---













