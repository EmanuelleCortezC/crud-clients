## Sistema de Gerenciamento de Clientes

Este projeto foi criado para solucionar o gerenciamento de clientes de empresas. A aplicação permite a criação, leitura, atualização e exclusão de informações sobre clientes e também de vendedores. É desenvolvida utilizando Laravel e PHP, utilizando o Docker para facilitar a configuração do ambiente.
A aplicação contém dispara de e-mail utilizando filas, contém uma API autenticada para consultar clientes com filtro de nome, utilização de cache e VITE. Os formulários foram construídos utilizando filament.

## Sumário

- [Configuração](#configuração-do-ambiente)
- [Documentação da API](documentação-da-api-de-consulta-de-clientes)


## Configuração do Ambiente

1. **Clone o repositório:**

    ```bash
    git clone https://github.com/EmanuelleCortezC/crud-clients.git
    cd crud-clients
    ```
   
Copie o Arquivo .env para ajustar as configurações

    ```bash
    cp .env.example .env
    ```
    
Crie e inicie os contêineres:

    ```bash
    docker-compose up -d
    ```

Execute as migrações do banco de dados e seeders:

    ```bash
    docker-compose exec laravel.test php artisan migrate
    docker-compose exec laravel.test php artisan db:seed
      ```

Compile os assets com Vite:

    ```bash
     docker-compose exec laravel.test npm install
     docker-compose exec laravel.test npm run build
     docker-compose exec laravel.test npm run dev
    ```
      
Acesse a aplicação pelo http://localhost para visualizar a aplicação em execução.

Os e-mails são enviados usando a fila. Para processar a fila, execute:

    ```bash
    php artisan queue:work --queue=emails
    ```

## Documentação da API de consulta de Clientes

Esta API permite disponibilizar os dados de todos os clientes cadastrados na aplicação.

