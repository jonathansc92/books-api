# Teste

Este projeto é destinado a pôr em exercício aprendizados e conhecimento técnico simulando um cadastro de pessoas.

## Breifing
### Objetivo
O principal objetivo deste projeto é criar um API em Laravel, que possibilita.

- Cadastro de livros.


# Padrões adotados
Para criação da API foi adotado alguns padrões e conceitos para melhor legibilidade e manutenção do projeto, como:
SOLID
Design Pattern (Requests, Resources, Services, Filters)

# Tecnologias
- API desenvolvida em Laravel
- Banco de Dados em MYSQL
- PHPUnit para testes

## Uso
Para rodar o projeto é necessário ter o **docker** configurador e um terminal **bash**. Após o clonar o repositório, deve ser acessada a pasta raiz do projeto e rodado o comando: `docker compose up -d` no terminal. Feito isso, só aguardar o projeto rodar e executar todos os scripts necessários. Caso desejar dados nas tabelas de banco de dados pode rodar o seeder com o comando `php artisan db:seed`. Para rodar os testes de integração, acessar o container e executar o comando `php artisan test`.

**BOOKS:**

Lista de livros: **[GET]** `/api/books`.

Mostrar uma livro: **[GET]** `/api/books/1`.

Salvar uma livro: **[POST]** `/api/books`, payload: `{ "title": "{title}", "publisher": "{publisher}", "edition": {edition}, "publish_year": {publish_year}, "subjects": [{id_do_assunto}, {id_do_assunto}], "authors": [{id_do_autor}, {id_do_autor}] }`.

Alterar uma livro: **[PUT]** `/api/books/1`, payload: `{ "title": "{title}", "publisher": "{publisher}", "edition": {edition}, "publish_year": {publish_year}, "subjects": [{id_do_assunto}, {id_do_assunto}], "authors": [{id_do_autor}, {id_do_autor}] }`.

Excluir uma livro: **[DELETE]** `/api/books/1`.

**AUTHORS:**

Lista de autores: **[GET]** `/api/authors`.

Mostrar uma author: **[GET]** `/api/authors/1`.

Salvar uma author: **[POST]** `/api/authors`, payload: `{ "name": "{name}" }`.

Alterar uma author: **[PUT]** `/api/authors/1`, payload: `{ "name": "{name}" }`.

Excluir uma author: **[DELETE]** `/api/authors/1`.

**SUBJECT:**

Lista de assuntos: **[GET]** `/api/subjects`.

Mostrar uma assunto: **[GET]** `/api/subjects/1`.

Salvar uma assunto: **[POST]** `/api/subjects`, payload: `{ "description": "{description}" }`.

Alterar uma assunto: **[PUT]** `/api/subjects/1`, payload: `{ "description": "{description}" }`.

Excluir uma assunto: **[DELETE]** `/api/subjects/1`.

**REPORT:**

Relatório: **[POST]** `/api/report`.

Obs: Liberar o path com os comandos abaixo, para gerar o excel:
`sudo chgrp -R www-data storage bootstrap/cache`
`sudo chmod -R ug+rwx storage bootstrap/cache`

**COLLECTION**

[https://api.postman.com/collections/3409729-51ffb08f-cab0-485b-8cf8-b3cba37c819e?access_key=PMAT-01HK5SEVBV9MGBKNNM35QB1B26](https://api.postman.com/collections/3409729-51ffb08f-cab0-485b-8cf8-b3cba37c819e?access_key=PMAT-01HK5SEVBV9MGBKNNM35QB1B26)


## O que faria se tivesse mais tempo?
- Colocaria filas ao gerar excel;
- Guardaria em cache a listagem de relatório;
- Deixaria nome do arquivo dinâmico.

## Autor
- Autor - Jonathan Cruz
- [https://jonathansc92.github.io/jonathancruzdev/?language=ptBr](https://jonathansc92.github.io/jonathancruzdev/?language=ptBr)