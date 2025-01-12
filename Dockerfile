FROM php:8.1-apache

WORKDIR /var/www/html

COPY . /var/www/html/

RUN apt-get update && apt-get install -y \
  libonig-dev \
  && docker-php-ext-install pdo_mysql \
  && docker-php-ext-enable pdo_mysql

RUN echo "Listen 3337" >> /etc/apache2/ports.conf && \
  sed -i 's/<VirtualHost \*:80>/<VirtualHost *:3337>/' /etc/apache2/sites-available/000-default.conf

# Habilitar módulo de reescrita
RUN a2enmod rewrite

# Permitir a leitura do .htaccess, editando a configuração do Apache
RUN sed -i 's|<Directory /var/www/>|<Directory /var/www/>\n    AllowOverride All|' /etc/apache2/apache2.conf

# Configura o DocumentRoot
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

EXPOSE 3337

# fixme
# RUN php /var/www/html/app/infra/migrations/create_user.php && php /var/www/html/app/infra/migrations/create_sale.php
