FROM php:8.2-cli

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader

# REPLACE WITH THIS ✅
RUN apt-get update && apt-get install -y unzip git curl libzip-dev zip \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

COPY . .
RUN composer dump-autoload

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]