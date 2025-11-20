FROM php:8.1-cli

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libicu-dev \
    && docker-php-ext-install intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . /app

RUN composer install --no-interaction --prefer-dist

CMD ["vendor/bin/phpunit", "--colors=always"]
