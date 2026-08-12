FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring gd \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader

# اعطاء التصلاحيات للمجلدات باش يروح خطأ 500
RUN chmod -R 777 storage bootstrap/cache

CMD ["sh", "-c", "php artisan key:generate --force && php artisan storage:link --force && php -S 0.0.0.0:${PORT:-8080} -t public public/index.php"]