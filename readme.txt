https://windows.php.net/download#php-8.4  - (VS17 x64 Thread Safe) + env path
https://getcomposer.org/Composer-Setup.exe

php.ini -> extension=pdo_mysql

composer init
composer require vlucas/phpdotenv
composer require mtdowling/cron-expression

rodar migrations: php /var/www/html/app/infra/migrations/create_user.php && php /var/www/html/app/infra/migrations/create_sale.php
testar conexão: php config.php

compose install
composer dump-autoload
