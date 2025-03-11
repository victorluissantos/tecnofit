# TecnoFit - Coding Challenge

Este repositório contém a solução para o desafio técnico da TecnoFit, desenvolvida em PHP 8.1 utilizando o framework Laravel 10. O projeto consiste em uma API de ranking de personal records para diferentes movimentos (exercícios).

---

## Tecnologias Utilizadas

- **PHP 8.1**
- **Laravel 10**
- **Docker + Docker Compose**
- **MySQL 8**
- **Arquitetura SOLID e Clean Code**

---

## Como executar o projeto

### 1. Clonar o repositório

```bash
git clone https://github.com/victorluissantos/tecnofit
cd tecnofit
```

### 2. Subir os containers Docker

```bash
docker-compose up -d
```

### 3. Acessar o container da aplicação Laravel

O Laravel está rodando dentro do container chamado tecnofit_app. Todos os comandos artisan devem ser executados dentro desse container.
```bash
docker exec -it tecnofit_app bash
```

### 4. Criar o arquivo .env

Dentro do container, execute:
```bash
cp .env.example .env
```

### 5. Configurar o banco de dados

O .env deve ter as seguintes configurações para conexão correta com o banco MySQL dentro do Docker:
```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=tecnofit
DB_USERNAME=tecnofit_user
DB_PASSWORD=tecnofit_pass
```

### 6. Executar as migrations e os seeds

Ainda dentro do container Laravel, execute:
```bash
php artisan migrate --seed
```

### 7. Acessar a API

A API de ranking estará disponível em:
```bash
GET http://localhost:8000/api/ranking/{movement_id}
```
Exemplo:
```bash
GET http://localhost:8000/api/ranking/1
```


#### Testando a API com Postman

Para facilitar os testes da API, incluímos um arquivo de coleção do Postman chamado postman-backend-api.json na raiz do repositório. Siga os passos abaixo para importar a coleção e testar os endpoints:

    Baixe o arquivo de coleção:

    Você pode baixar o arquivo aqui.

    Importe a coleção no Postman:
        Abra o Postman.
        Clique em Import no canto superior esquerdo.
        Selecione a opção Raw Text ou Upload Files e escolha o arquivo postman-backend-api.json.
        Clique em Continue e depois em Import.

    Teste o endpoint de login:
        Na coleção importada, execute a requisição Login.
        Use as credenciais conforme definidas no seed (por exemplo, email: mosciski.angeline@example.com e senha: password).
        Se o login for bem-sucedido, um token será retornado.

    Configure o token no Postman:
        Após o login, copie o token retornado.
        Defina uma variável de ambiente (ou global) chamada token e cole o valor do token.
        Essa variável é usada no header da requisição de Ranking com o formato:

    Authorization: Bearer {{token}}

Teste o endpoint de Ranking:

    Na coleção, execute a requisição Get Ranking - Movimento 1.
    A URL utilizada será:

```bash
GET http://localhost:8000/api/ranking/1
```
Você deverá receber um JSON com o nome do movimento e o ranking dos usuários, com suas posições, recordes e datas.


#### Comandos úteis
Entrar no container da aplicação Laravel
```bash
docker exec -it tecnofit_app bash
```
Executar migrations novamente (reset completo)
```bash
php artisan migrate:fresh --seed
```
Ver logs do container da aplicação
```bash
docker logs tecnofit_app
```
Parar os containers
```bash
docker-compose down
```


Requisitos Atendidos

✅ Código em PHP 8.1 usando Laravel 10
✅ Aplicação containerizada com Docker e Docker Compose
✅ Arquitetura seguindo boas práticas (SOLID, Clean Code, Separation of Concerns)
✅ Implementação da API de ranking com tratamento correto de empate no ranking
✅ Instruções de execução claras e completas neste README
✅ Código versionado e publicado no GitHub
✅ Validação e Sanitização de Dados
✅ Autenticação e Autorização
✅ Tratamento de Erros

Observações

    Todos os comandos artisan devem ser executados dentro do container tecnofit_app.
    O banco de dados roda no container tecnofit_db.
    O ranking considera que usuários com o mesmo recorde ocupam a mesma posição.

Contato

Desenvolvido por: Vctor Luis Santos
E-mail: victorluissantos@live.com
LinkedIn: https://www.linkedin.com/in/victor-luis-santos/