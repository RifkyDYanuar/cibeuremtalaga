# syntax=docker/dockerfile:1

# 1. Base PHP 8.3 FPM + ekstensi Laravel, DomPDF, dan Maatwebsite Excel + Composer
FROM php:8.3-fpm AS php-base

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    curl \
    unzip \
    zip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libwebp-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j"$(nproc)" \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        intl \
        xml \
        opcache \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# 2. Tahap instalasi dependency Composer (berbagi layer cache dengan stage composer & php)
FROM php-base AS deps

COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist --no-scripts --optimize-autoloader

# 3. Image Composer khusus project ini (memiliki ekstensi PHP yang sama dengan runtime PHP)
FROM deps AS composer

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_CACHE_DIR=/tmp/composer

ENTRYPOINT ["composer"]
CMD ["install", "--no-interaction", "--prefer-dist", "--optimize-autoloader"]

# 4. Image Web Server (Nginx) untuk project ini
FROM nginx:1.27-alpine AS web

COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY public /var/www/html/public

WORKDIR /var/www/html
EXPOSE 80

# 5. Image PHP-FPM final untuk aplikasi Laravel (default target saat docker build .)
FROM deps AS php

COPY docker/php/php.ini /usr/local/etc/php/conf.d/99-custom.ini
COPY docker/php/entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN sed -i 's/\r$//' /usr/local/bin/docker-entrypoint.sh \
    && chmod +x /usr/local/bin/docker-entrypoint.sh

COPY . /var/www/html

RUN composer dump-autoload --optimize --no-scripts \
    && mkdir -p \
        storage/app/public \
        storage/app/private \
        storage/framework/cache/data \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["php-fpm"]
EXPOSE 9000

