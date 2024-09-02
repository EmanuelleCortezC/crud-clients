## Sistema de Gerenciamento de Clientes

Este projeto foi criado para solucionar o gerenciamento de clientes de empresas. A aplicação permite a criação, leitura, atualização e exclusão de informações sobre clientes e também de vendedores. É desenvolvida utilizando Laravel e PHP e o Docker para facilitar a configuração do ambiente.
A aplicação contém disparo de e-mail utilizando filas, contém uma API autenticada para consultar clientes com filtro de nome, utilização de cache e VITE. 
Os formulários foram construídos utilizando filament.

## Sumário

- [Configuração](#configuração-do-ambiente)
- [Documentação da API](#documentação-da-api)


## Configuração do Ambiente

**Clone o repositório:**
```bash
git clone https://github.com/EmanuelleCortezC/crud-clients.git
cd crud-clients
```

**Copie o Arquivo .env para ajustar as configurações**
```bash
cp .env.example .env
```  
    
**Crie e inicie os contêineres**
```bash 
docker-compose up -d
```

**Execute as migrações do banco de dados e seeders**
```bash
docker-compose exec laravel.test php artisan migrate
docker-compose exec laravel.test php artisan db:seed
```

**Compile os assets com Vite**
```bash   
docker-compose exec laravel.test npm install
docker-compose exec laravel.test npm run build
docker-compose exec laravel.test npm run dev
```  
      
**Acesse a aplicação pelo http://localhost para visualizar a aplicação em execução**

**Os e-mails são enviados usando a fila. Para processar a fila, execute**
```bash  
php artisan queue:work --queue=emails
```  
---

## Documentação da API

Esta API permite disponibilizar os dados de todos os clientes cadastrados na aplicação. 
A API possui autenticação, para conseguir acesso é necessário gerar um token.

**Crie um login**

Utilizando o Postman ou a sua plataforma de preferência de API, faça uma requisição do método POST utilizando o Endpoint `/api/login` e o corpo contendo o seu email e sua senha da seguinte forma:

```json   
    {
        "email": "seu-email@gmail.com",
        "password": "sua-senha"
    }
```
Caso não ocorra nenhum a resposta de retorno será seu token

```json
    
    {
        "token": "token-de-autenticacao"
    }
```
Após a geração do token inclua-o no Header, a Key sendo `Authorization` e o Value `Bearer token-de-autenticacao`

```json    
    {
        "email": "seu-email@gmail.com",
        "password": "sua-senha"
    }
```   
**Listar Clientes**

Faça uma requisição do método GET utilizando o Endpoint `/api/login` e caso você deseje filtrar algum cliente específico, adicione o nome no filtro da busca.
Resposta de Sucesso:

```json
        {
            "data": [
                {
                    "id": 1,
                    "name": "João Oliveira",
                    "email": "joao.oliveira@example.com",
                    "image": "images/client1.png",
                    "type": {
                        "id": 1,
                        "type": "Pessoa Física"
                },
                "phones": [
                    {
                        "number": "(99) 99999-9999"
                    }
                ],
                "sellers": [
                    {
                    "id": 1,
                    "name": "Rodrigo"
                    }
                ]
            },
        ],
        "links": {
            "first": "http://localhost/api/client?page=1",
            "last": "http://localhost/api/client?page=1",
            "prev": null,
            "next": null
        },
        "meta": {
            "current_page": 1,
            "from": 1,
            "last_page": 1,
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http://localhost/api/client?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": null,
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "path": "http://localhost/api/client",
            "per_page": 2,
            "to": 2,
            "total": 2
        }
    }
```   

    
---
