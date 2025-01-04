# Configurações do Ambiente

###  No console, navegue até o diretório /src

---

### 1. Instale as dependências do composer
``` bash
composer install 
```
---

### 2. Crie o arquivo .env
- Copie o arquivo .env.example
``` bash
cp .env.example .env 
```
---
### 3. Gere a chave da aplicação
``` bash
php artisan key:generate
```
---

### 4. Configure o banco de dados
1. Crie o banco de dados no MySQL
``` sql
CREATE DATABASE <nome_do_banco> 
```
2. No arquivo .env, preencha as informações locais do banco de dados criado
``` env
DB_CONNECTION=mysql
DB_HOST=<host_do_banco_de_dados>
DB_PORT=<porta_utilizada>
DB_DATABASE=<nome_do_banco>
DB_USERNAME=<nome_do_usuário>
DB_PASSWORD=<senha_do_usuário>
```
---
### 5. Execute as Migrations
- Criação e estruturação das tabelas do banco de dados
``` bash
php artisan migrate 
```
---

### 6. Execute os Seeders
- Preenchimento de dados de exemplo no banco 
``` bash
php artisan db:seed 
```
---

### 7. Inicie o Servidor Local
``` bash
php artisan serve 
```
---

## \> Ao fim deste processo o ambiente estará configurado e pronto para testagem!

Veja o tutorial *[testando a api](/docs/md/rodando_testes.md)*

---