# 1. Use CLI for "artisan serve" or FPM for Nginx
FROM php:8.2-cli

# 2. Install system dependencies AND PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libonig-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring

# 3. Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# 4. Cache dependencies (This is the "Speed" part)
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader --no-dev

# 5. Copy the rest of the RiRi's Candles source code
COPY . .

# 6. Finalize Composer (Generate the autoloader)
RUN composer dump-autoload --optimize

# 7. Set permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]