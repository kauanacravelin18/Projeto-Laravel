# Sistema de Controle de Almoxarifado

Projeto final da disciplina de Desenvolvimento Back-End, utilizando Laravel.

## Integrantes

- Kauana Cravelin — 5º
- Gabriel Krupek — 4ºA
- Kauã Delgado — 4ºA
- Gustavo Pereira Borges — 4ºA

## Descrição

Sistema para controle de itens de almoxarifado (móveis, imóveis e veículos), com registro de entrada, saída e movimentação entre locais.

## Divisão de tarefas

A divisão abaixo foi baseada nas contribuições registradas no histórico de commits do projeto.

### Kauana Cravelin

- Estrutura inicial do projeto Laravel.
- Instalação e configuração do Laravel Breeze com Blade.
- Implementação e ajustes da autenticação.
- Desenvolvimento e padronização do layout da aplicação.
- Desenvolvimento e melhorias da interface do dashboard.
- Melhorias das interfaces de Itens, Categorias, Locais e Movimentações.
- Melhorias na tela de perfil.
- Ajustes na navegação e sidebar.
- Desenvolvimento e estilização da tela de recuperação de senha.
- Participação nos ajustes de validação e autorização das movimentações.
- Ajustes nas rotas do sistema.

### Gabriel Krupek

- Criação dos controllers de Categorias, Itens, Locais e Movimentações.
- Desenvolvimento das views de Itens.
- Desenvolvimento das views de Categorias.
- Desenvolvimento das views de Locais.
- Desenvolvimento das views de Movimentações.
- Criação do layout base inicial da aplicação.
- Ajustes nas rotas do sistema.
- Ajustes no model de usuário.

### Kauã Delgado

- Criação das migrations das tabelas de Categorias, Locais, Itens e Movimentações.
- Criação dos models de Categorias, Locais, Itens e Movimentações.
- Criação dos seeders de usuários, Categorias, Locais e Itens.
- Configuração do `DatabaseSeeder`.
- Implementação do campo `role` na tabela de usuários.

### Gustavo Pereira Borges

- Implementação do middleware de controle de acesso por função.
- Registro e configuração do middleware.
- Proteção das rotas do sistema.
- Implementação da `MovimentacaoPolicy`.
- Implementação de validações com `StoreMovimentacaoRequest`.
- Ajustes de autorização no `MovimentacaoController`.
- Ajustes no `LocalController`.
- Ajustes no model `Movimentacao`.

## Tecnologias utilizadas

- PHP
- Laravel
- Laravel Breeze
- Blade
- SQLite/MySQL
- HTML
- CSS
- JavaScript

## Para rodar o sistema 

- No terminal rodar NPM RUN DEV (para aparecer as aplicações front end)
