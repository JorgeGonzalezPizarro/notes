FROM composer as backend

WORKDIR /app

COPY composer.json composer.lock /app/
RUN composer install  \
    --ignore-platform-reqs \
    --no-ansi \
    --no-autoloader \
    --no-dev \
    --no-interaction \
    --no-scripts

COPY . /app/
RUN composer dump-autoload --no-dev --optimize --classmap-authoritative
RUN cd /app/ composer update

FROM php:7.1-apache

RUN apt-get update  && apt-get install -y git vim curl debconf subversion git apt-transport-https apt-utils zlib1g-dev

RUN pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo pdo_mysql \
    && chown -R www-data:www-data /var/www/



COPY --from=backend /app  /var/www/html



VOLUME ${PWD}: /var/www/html

RUN chmod 777 -R /var/www/html
#COPY /docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

COPY php.ini $PHP_INI_DIR
#COPY /docker/php/php.ini /usr/local/php
#COPY /docker/php/php.ini /usr/local/lib/php/
WORKDIR /var/www/html