FROM php:8.2-cli

WORKDIR /app

COPY . .

# REPLACE WITH THIS ✅
RUN apt-get update && apt-get install -y unzip git curl libzip-dev zip \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV COMPOSER_PROCESS_TIMEOUT=600
RUN composer install --no-interaction --prefer-dist --no-scripts

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]