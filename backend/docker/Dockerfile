FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
        curl \
        wget \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer require doctrine/dbal
#RUN apt-get install php7.0-pgsql
WORKDIR /var/www/api1
ADD . /var/www/api1

RUN chown -R www-data:www-data /var/www/api1/storage
RUN chmod 755 /var/www/api1/storage

