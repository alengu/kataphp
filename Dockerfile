# Dockerfile pour exécuter les tests PHPUnit avec PHP 8.1
FROM php:8.1-cli

# Installer les extensions PHP nécessaires (exemple : intl si besoin)
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libicu-dev \
    && docker-php-ext-install intl

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier le projet
WORKDIR /app
COPY . /app

# Installer les dépendances PHP
RUN composer install --no-interaction --prefer-dist

# Commande par défaut pour lancer les tests
CMD ["vendor/bin/phpunit", "--colors=always"]
