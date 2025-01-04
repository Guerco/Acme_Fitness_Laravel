
# Testando os métodos Http

---

## Executando os Testes
- Para rodagem dos casos de teste, basta executar o comando no diretório *[/src](/src/)*

``` bash
php artisan test
```
- Este comando executará todos os casos de teste em *[/tests/Unit](/src/tests/Unit/)*

### Você também pode executar testes por grupos:
``` bash
php artisan test --group=http
```

- Executando todos testes de http

``` bash
php artisan test --group=get
```

- Executando todos testes para um método especifico
``` bash
php artisan test --group=categorias
```
- Executando todos testes para um recurso especifico

---

### O diretório dos testes é *[/src/tests/Unit](/src/tests/Unit)*
- Nele você pode personalizar os testes e as requisições http testadas

---

### Configurando as Requests

Ex: *[PostProdutoTest](/src/tests/Unit/Http/Produto/PostProdutoTest.php)*
``` php
$response = $this->postJson(
    '/api/produtos/' , 
    [
        'nome' => 'Produto Test' ,
        'data_cadastro' => '2000-01-01' ,
        'categoria' => [
            'id' => $categoria->id
        ] ,
    ]
);
```
- Aqui você pode alterar os dados a serem enviados pelo request 

---

## Dica Extra:
Utilizando --testdox, os resultados dos testes serão exibidos de forma mais legível e interpretável
```bash
php artisan test --testdox
```
---

Para mais informações sobre o projeto *[veja aqui](/README.md)*

---