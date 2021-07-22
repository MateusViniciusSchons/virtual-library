# Detalhes do Projeto
- Esta é uma aplicação que gerencia de forma básica a lista de livros de uma biblioteca, deixando criar, alterar, deletar, listar e ver detalhes dos produtos.
- Ela é responsiva e utiliza Media Queries do CSS para isso.
- Para mostrar detalhes de um livro, a aplicação utiliza um slug único para cada livro para a URL do navegador ficar mais elegante para o usuário.

# Passos Para Rodar o Projeto

  Depois de clonar o repositório e entrar na pasta virtual-library, siga os passos abaixo.

1- Mude as informações "DB_USERNAME" e "DB_PASSWORD" no arquivo .env.example para as suas credenciais de acesso ao mysql.

2- Renomeie o arquivo .env.example para somente .env

3- Rode o comando "composer install" na pasta raíz do projeto.

4- Rode o comando "php artisan key:generate" no terminal estando na pasta raíz do projeto.

5- Crie uma base de dados chamada "virtual_library" no seu MySQL.

6- Rode o comando "php artisan migrate" na pasta raíz do projeto.

7- Rode o comando "npm install" na pasta raíz do projeto.

8- Rode o comando "npm run dev" na pasta raíz do projeto.

9- Em outra linha de comando, rode o comando "php artisan serve" na pasta raíz do projeto.

10- Acesse a aplicação em "http:127.0.0.1:8000" em seu navegador.
