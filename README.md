# 🛠️ Loja de Ferramentas

Sistema web desenvolvido em Laravel para gerenciamento de ferramentas e controle de estoque.

## 📖 Sobre o Projeto

A Loja de Ferramentas é uma aplicação web que permite o cadastro e gerenciamento de ferramentas, categorias e estoque. O sistema foi desenvolvido com o objetivo de facilitar a organização de equipamentos e o acompanhamento da disponibilidade de itens.

## ✨ Funcionalidades

- Cadastro de ferramentas
- Edição de ferramentas
- Exclusão de ferramentas
- Listagem de ferramentas cadastradas
- Cadastro de categorias
- Associação de ferramentas a categorias
- Controle de estoque
- Definição de estoque mínimo
- Upload de imagens das ferramentas
- Interface responsiva

## 🛠️ Tecnologias Utilizadas

- PHP
- Laravel
- MySQL
- Blade
- Tailwind CSS
- Eloquent ORM

## 📂 Estrutura de Dados

### Ferramentas

Cada ferramenta possui:

- Nome
- Marca
- Modelo
- Material do cabo
- Tamanho da chave
- Tensão elétrica
- Peso
- Quantidade em estoque
- Estoque mínimo
- Categoria
- Imagem

### Categorias

As categorias permitem organizar as ferramentas de acordo com seu tipo ou finalidade.

## 🚀 Instalação

Clone o repositório:

```bash
git clone https://github.com/Nathyy21/loja-de-ferramentas.git
```

Acesse a pasta do projeto:

```bash
cd loja-de-ferramentas
```

Instale as dependências:

```bash
composer install
```

Crie o arquivo de ambiente:

```bash
cp .env.example .env
```

Configure o banco de dados no arquivo `.env`.

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Execute as migrations:

```bash
php artisan migrate
```

Crie o link simbólico para as imagens:

```bash
php artisan storage:link
```

Inicie o servidor:

```bash
php artisan serve
```

## 📸 Imagens

As imagens das ferramentas são armazenadas utilizando o sistema de armazenamento do Laravel e podem ser visualizadas através do link simbólico criado pelo comando:

```bash
php artisan storage:link
```


## 📄 Licença

Projeto desenvolvido para fins acadêmicos e aprendizado em desenvolvimento web com Laravel.