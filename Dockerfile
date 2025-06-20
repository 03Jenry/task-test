FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    default-mysql-client \
    libzip-dev zip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql zip gd \
    && docker-php-ext-install mbstring exif bcmath soap \
    && pecl install redis && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www

EXPOSE 9000

CMD ["php-fpm"]
