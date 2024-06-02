# Projeto Integrador - 7º Período de Sistemas de Informação

Este repositório contém o projeto integrador desenvolvido pela turma do 7º período de Sistemas de Informação. O projeto visa integrar os conhecimentos adquiridos ao longo do curso em uma aplicação prática.

[Clique aqui](https://drive.google.com/file/d/1ibc6i16uqgh7kwE89cPmpfV2EYOWlcp3/view) para ser redirecionado para a documentação do projeto.

## Equipe

- Matheus Monthay
- Marcos
- Jefferson
- Leonardo
- Willianes

## Descrição

O projeto consiste em um sistema de finanças onde é possivel o usuario adicionar creditos e debitos e fazer consultas no mesmo.

## Tecnologias Utilizadas

- Linguagem de programação: PHP
- Banco de Dados: MySql
- Frameworks: Laravel 10
- Outras tecnologias: Booststrap

## Como Executar o Projeto

Para executar o projeto localmente, siga as instruções abaixo:

1. Clone este repositório:
   ```bash
   git clone https://github.com/seu-usuario/nome-do-repositorio.git](https://github.com/MatheusMonthay/Projeto-Integrador.git)https://github.com/MatheusMonthay/Projeto-Integrador.git

2. Instale as pedencias do composer no diretorio do projeto
   ```bash
   composer install

3. Configure o Arquivo de Ambiente
      O Laravel requer um arquivo .env para configurar variáveis de ambiente, como conexões de banco de dados e chaves de aplicativo. Por padrão, o Laravel vem com um arquivo .env.example que você deve copiar para .env:
   ```bash
   cp .env.example .env
   
4. Depois rode as migration
   ```bash
   php artisan migrate

5. Para iniciar o servidor execute
    ```bash
    php artisan serve
   
