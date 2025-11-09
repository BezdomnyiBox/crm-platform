FROM php:8.3-fpm-alpine

RUN apk add --no-cache bash git zip unzip libpq-dev postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql

WORKDIR /app
COPY . .
RUN curl -sS https://getcomposer.org/installer | php && php composer.phar install

CMD ["php-fpm"]
