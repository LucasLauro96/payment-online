# Payment Online

Sistema desenvolvido por Lucas Lauro

## Instalação na localhost

- 1. Instalar versão do PHP 7.3 ou superior
- 2. Instalar composer (Gerenciador de pacotes do PHP)
- 3. Instalar MySQL 5.7 ou superior
- 4. Instalar Node.js e NPM
- 5. Clonar o repositorio (Payment Online) para sua maquina
- 6. Apos clonar entrar na pasta do projeto com o comando "cd payment-online"
- 7. Executar comando "npm install"
- 8. Executer comando "composer install"
- 9. Apos instalar todas as dependencias, executar o comando "npm run prod", para gerar e compilar todos os CSS o JavaScript
- 10. Copie o ".env.example"
- 11. Após copiar, renomeie o arquivo gerado para ".env"
- 12. Apos renomeado, coloque as informações do seu banco dados, como exemplo abaixo
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
- 13. Agora execute o comando "php artisan serve" para rodar o projeto em sua maquina.