# Informações sobre a API

---

## Recursos Implementados

---
## **Categorias**

- **GET** `/api/categorias` – Lista todas as categorias.
- **GET** `/api/categorias/{id}` – Busca uma categoria pelo ID.
- **POST** `/api/categorias` – Cria uma nova categoria.
- **PUT** `/api/categorias/{id}` – Atualiza uma categoria existente.
- **DELETE** `/api/categorias/{id}` – Deleta uma categoria.


### Body para  **POST** e **PUT**
``` 
{
    "nome" : "Nome da Categoria",
    "descricao" : "Descrição da Categoria" (opcional)
}
```
---
## **Clientes**

- **GET** `/api/clientes` – Lista todos os clientes.
- **GET** `/api/clientes/{id}` – Busca um cliente pelo ID.
- **POST** `/api/clientes` – Cria um novo cliente.
- **PUT** `/api/clientes/{id}` – Atualiza um cliente existente.
- **DELETE** `/api/clientes/{id}` – Deleta um cliente.

### Body para  **POST** e **PUT**
``` 
{
    "nome" : "Nome da Categoria",
    "cpf" : "XXX.XXX.XXX-XX",
    "data_nascimento" : "AAAA-MM-DD" 
}
``` 
---
## **Endereços**

- **GET** `/api/enderecos` – Lista todos os endereços.
- **GET** `/api/enderecos/{id}` – Busca um endereço pelo ID.
- **POST** `/api/enderecos` – Cria um novo endereço.
- **PUT** `/api/enderecos/{id}` – Atualiza um endereço existente.
- **DELETE** `/api/enderecos/{id}` – Deleta um endereço.

### Body para  **POST** e **PUT**
``` 
{
    "logradouro" : "Logradouro do Endereço",
    "cidade" : "Cidade do Endereço",
    "bairro" : "Bairro do Endereço",
    "numero" : "XXX",
    "cep" : "  "XXXXX-XXX",
    "complemento" : "Complemento do Endereço" (opcional)
}
``` 
---

## **Produtos**

- **GET** `/api/produtos` – Lista todos os produtos.
- **GET** `/api/produtos/{id}` – Busca um produto pelo ID.
- **POST** `/api/produtos` – Cria um novo produto.
- **PUT** `/api/produtos/{id}` – Atualiza um produto existente.
- **DELETE** `/api/produtos/{id}` – Deleta um produto.

### Body para  **POST** e **PUT**
``` 
{
    "nome" : "Nome do Produto",
    "imagem_path" : "Caminho para a imagem do Produto", (opcional)
    "descricao" : "Descrição do Produto", (opcional)
    "data_cadastro" : "AAAA-MM-DD", (opcional - caso não informado: data atual) 
    "categoria" : {
        "id" : XX
    }
}
``` 
---

## **Variações**

- **GET** `/api/variacoes` – Lista todas as variações.
- **GET** `/api/variacoes/{id}` – Busca uma variação pelo ID.
- **POST** `/api/variacoes` – Cria uma nova variação.
- **PUT** `/api/variacoes/{id}` – Atualiza uma variação existente.
- **DELETE** `/api/variacoes/{id}` – Deleta uma variação.

### Body para  **POST** e **PUT**
``` 
{
    "tamanho" : "Tamanho da Variação", (opcional)
    "peso" : "Peso da Variação", (opcional)
    "cor" : "Cor da Variação", (opcional)
    "preco" : XX.XX,  
    "estoque" : XX,  
    "prodito" : {
        "id" : XX
    }
}
``` 

---

## **Vendas**

- **GET** `/api/vendas` – Lista todas as vendas.
- **GET** `/api/vendas/{id}` – Busca uma venda pelo ID.
- **POST** `/api/vendas` – Cria uma nova venda.
- **DELETE** `/api/vendas/{id}` – Deleta uma venda.

### Body para  **POST** e **PUT**
``` 
{
    "descontos" : XX.XX, (opcional)
    "forma_pagamento" : "PIX" OU "Boleto" OU  "Cartão", (opcional) 
    "cliente" : {
        "id" : XX
    },
    "endereco" : {
        "id" : XX
    },
    "variacoes" : [
        {
            "quantidade" : XX,
            "variacao" : {
                "id" : XX
            }
        }
    ]
}
``` 

---

## Códigos de Status:

**GET**
- 200 - Lista Retornada com sucesso
- 500 - Falha interna na execução da operação

**GET ID** 
- 200 - Entidade retornada com sucesso
- 404 - Entidade não encontrada 
- 500 - Falha interna na execução da operação

**POST** 
- 201 - Criado com sucesso
- 422 - Erro de Validação
- 500 - Falha interna na execução da operação

**PUT**
- 204 - Alterado com sucesso
- 404 - Entidade não encontrada
- 422 - Erro de Validação
- 500 - Falha interna na execução da operação

**DELETE**
- 204 - Removido com sucesso
- 404 - Entidade não encontrada
- 500 - Falha interna na execução da operação

---
Para mais informações sobre o projeto *[veja aqui](/README.md)*
---