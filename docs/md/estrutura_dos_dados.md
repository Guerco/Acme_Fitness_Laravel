# Estrutura de dados do sistema

---
- A estrutura das tabelas do banco de dados segue o formato:

![Estrutura do Banco de Dados](/Acme_Fitness_Laravel/docs/estrutura_bd.png)

- Cada produto pertence a uma categoria especifica, e possui diferentes variações, que podem diferir em tamanho, peso e cor, consequentemente também no preço.
- Cada venda possui uma lista de variações em diferentes quantidades, e estão associadas a um cliente e endereço específicos

---

### O valor do frete é fixo para todas as vendas, podendo variar com o tempo, o valor do frete, bem como outras regras de negócio mediante necessidade, é configurado em [/config/regras_de_negocio.php](/Acme_Fitness_Laravel/src/config/regras_de_negocio.php)

```php
<?php
// Arquivo para configurar informações referentes a regras de negócio
return [
    'valor_frete' => 10.00
];
```
---

Para mais informações sobre o projeto *[veja aqui](/Acme_Fitness_Laravel/README.md)*

---