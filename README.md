## HomeWork

[PHP 8.4](https://windows.php.net/download#php-8.4) (VS17 x64 Thread Safe) + Env Path.
[Composer](https://getcomposer.org)
[Docker](https://www.docker.com)

## Passo a passo para a execução do projeto

1. **Baixa, instalar e configurar PHP + Composer**
   - [https://windows.php.net/download#php-8.4](https://windows.php.net/download#php-8.4)
   - configurar arquivo `php.ini` adicionando `extension=pdo_mysql`
   - [https://getcomposer.org/Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe)

2. **Acesse o site do Docker, faça o download e a instalação**:
   - [https://docs.docker.com/desktop/setup/install/windows-install](https://docs.docker.com/desktop/setup/install/windows-install/).

3. **Crie um arquivo `.env` no diretório do projeto ou renomeei o arquivo `.env.exemple` para `.env`**

4. **Após criar um `.env` é necessário adicionar as variáveis de ambiente para o projeto. Exemplo:**

   ```bash
   DB_CONNECTION=mysql
   DB_HOST=tray_commission_system_mysql_container
   DB_PORT_EXTERNAL=3307
   DB_PORT_INTERNAL=3306
   DB_DATABASE=db_commission_system
   DB_USERNAME=root
   DB_PASSWORD=root
   ```

5. **Rodar esses comandos no terminal do diretório do projeto:**

   ```bash
    docker-compose up -d
   ```

6. **Rodar as migrations para criação das tabelas:**
   - Acesse o terminal do container "tray_commission_system_app_container" no docker e execute:

   ```bash
   php /var/www/html/app/infra/migrations/create_user.php && php /var/www/html/app/infra/migrations/create_sale.php
   ```

7. **Aplicação estará disponível em `http://localhost:3337`**

8. **Caso precise parar os serviços execute esse comando no terminal do diretório do projeto:**

   ```bash
    docker-compose down
   ```
