FROM php:8.3-fpm

RUN apt-get update && apt-get install -y curl git zip && rm -rf /var/lib/apt/lists/*
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Debugger
RUN pecl install xdebug && docker-php-ext-enable xdebug