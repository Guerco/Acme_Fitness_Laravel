#
API desenvolvida em laravel para sistema de E-Commerce de produtos fitness

---

### Projeto desenvolvido com:
- *PHP 8.2.4*
- *MySQL*
- *Composer 2.7.6*
- *Laravel Framework 11.36.1*
- *PHPUnit 11.5.2*

---

### Primeiros Passos

Antes de rodar o projeto, cheque as *[configurações iniciais](/docs/md/configuracoes_iniciais.md)*

---

### Estrutura do projeto
| **Diretório/Arquivo**                 | **Descrição**                                                                |
|---------------------------------------|------------------------------------------------------------------------------|
| [/src](/src/)                          | Código fonte principal do projeto. Contém a lógica do aplicativo.                                                                         |
| [/Controllers](/src/app/Http/Controllers/)       | Gerenciadores de requisições HTTP. Contém os controladores responsáveis por processar as requisições e retornar as respostas. |
| [/Resources](/src/app/Http/Resources/)       | Recursos de transformação de dados. Responsável por formatar e estruturar os dados antes de retornar na resposta. |
| [/Requests](/src/app/Http/Requests/)       | Validação de requisições. Contém as classes que gerenciam a validação dos dados recebidos nas requisições. |
| [/Services](/src/app/Services/)       | Lógica de negócios. Contém serviços que implementam funcionalidades específicas para serem utilizadas pelos controladores. |
| [/Models](/src/app/Models/)       | Modelos de dados. Contém as representações das tabelas no banco de dados e as interações com elas. |
| [/migrations](/src/database/migrations/)       | Migrações do banco de dados. Contém os arquivos responsáveis por alterar o schema do banco, como criação de tabelas e colunas. |
| [/factories](/src/database/factories/)       | Fábricas de dados. Utilizado para gerar dados de exemplo ou para popular o banco de dados com dados fictícios. |
| [/seeders](/src/database/seeders/)       | Semeadores de banco de dados. São responsáveis por popular as tabelas do banco com dados padrões ou iniciais. |
| [/routes/api.php](/src/routes/api.php)       | Definição das rotas da API. Arquivo que define as rotas e os controladores responsáveis pelas requisições da API. |
| [/tests/Unit](/src/tests/Unit/)       | Testes unitários. Contém os testes responsáveis por garantir que as funcionalidades do sistema estão funcionando corretamente. |

---

### Estruturação dos dados

![Diagrama de Entidades](/docs/diagrama_entidades.png)

Para informações sobre o modelo de dados adotado, veja *[estrutura dos dados.](/docs/md/estrutura_dos_dados.md)*

--- 

### Api e Requisições
- Para informações sobre os recursos e requisições fornecidos pela api, veja *[documentação da api](/docs/md/api.md)*

---

### Validação de Dados
- Para informações sobre os métodos de validação e as regras aplicadas, veja *[documentação da validação](/docs/md/validacao.md)*

---
### Testes
- Para informações sobre os testes, veja *[documentação de testes](/docs/md/rodando_testes.md)*
---

Veja também: [versão desenvolvida em php puro](https://github.com/Guerco/Acme_Fitness)
---
