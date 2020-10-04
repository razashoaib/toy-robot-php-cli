FROM php:cli

WORKDIR /var/www/app

RUN apt-get update \
    && apt-get install zip unzip

COPY . /var/www/app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN /usr/local/bin/composer install
