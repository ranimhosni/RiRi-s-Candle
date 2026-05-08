# --- STAGE 1: Build Assets (Frontend) ---
FROM node:18-alpine AS frontend-builder
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# --- STAGE 2: The Final Production Image ---
FROM php:8.2-cli-alpine

# Install system dependencies for PHP
RUN apk add --no-cache \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    oniguruma-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy only dependency files first (for caching)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# Copy the rest of the application
COPY . .

# Copy the compiled assets from STAGE 1
COPY --from=frontend-builder /app/public/build ./public/build

# Finalize PHP setup
RUN composer dump-autoload --optimize \
    && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]