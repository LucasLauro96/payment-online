# Payment Online

Sistema desenvolvido por Lucas Lauro

## Instalação na localhost

- Instalar versão do PHP 7.3 ou superior
- Instalar composer (Gerenciador de pacotes do PHP)
- Instalar MySQL 5.7 ou superior
- Instalar Node.js e NPM
- Clonar o repositorio (Payment Online) para sua maquina
- Apos clonar entrar na pasta do projeto com o comando "cd payment-online"
- Executar comando "npm install"
- Executer comando "composer install"
- Apos instalar todas as dependencias, executar o comando "npm run prod", para gerar e compilar todos os CSS o JavaScript
- Copie o ".env.example"
- Após copiar, renomeie o arquivo gerado para ".env"
- Apos renomeado, coloque as informações do seu banco dados, como exemplo abaixo

    >DB_CONNECTION=mysql
    >
    >DB_HOST=127.0.0.1
    >
    >DB_PORT=3306
    >
    >DB_DATABASE=laravel
    >
    >DB_USERNAME=root
    >
    >DB_PASSWORD=123456
    
- Execute o comando "php artisan migrate" para criar as tabelas em seu banco de dados
- Agora execute o comando "php artisan serve" para rodar o projeto em sua maquina