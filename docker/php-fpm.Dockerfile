FROM php:7.4.6-fpm-alpine

RUN apk update \
    && apk --no-cache add postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql