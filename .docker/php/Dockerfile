FROM php:8.2-fpm

# Dependencias necesarias
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    libcurl4-openssl-dev pkg-config libssl-dev libicu-dev libjpeg-dev \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql zip intl

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www/html

COPY . .

RUN composer install
RUN npm install && npm run build

# Genera la APP_KEY para evitar errores al iniciar
RUN php artisan key:generate

CMD ["php-fpm"]
