# Gerenciador de Produtos

## Como rodar o projeto
- Opção 1: Instale o [Docker](https://docs.docker.com/engine/install/) e o [Docker Compose](https://docs.docker.com/compose/install/).
- Clone o projeto.
- Execute o comando `docker-compose build app` para construir a imagem do projeto.
- Execute o comando `docker-compose up -d` para rodar o projeto em background.
- Acesse o projeto em `http://localhost:8000`.

- Opção 2: Instale o [XAMPP] (https://www.apachefriends.org/pt_br/index.html)
- Inicie Apache e MySQL.
- Clone o projeto para o diretorio `C:\xampp\htdocs`.


- Para checar o banco de dados, acesse `http://localhost:8080` com as credenciais definidas no arquivo `.env` (por padrão o login é **user** e a senha é **pass**).
- Para parar o projeto, execute o comando `docker-compose down`.

## Tecnologias utilizadas

- PHP 8
- MySQL
- Nginx
- XAMPP
- Docker
- Docker Compose