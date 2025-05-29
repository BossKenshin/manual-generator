FROM php:8.2-cli

# --- 1. Install system packages and PHP extensions ---
RUN apt-get update && apt-get install -y \
    unzip git zip curl gnupg \
    libzip-dev libonig-dev libxml2-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql zip mbstring xml gd

# --- 2. Install Node.js & npm (needed for Vite) ---
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# --- 3. Install Composer globally ---
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader

RUN cp .env.example .env || true

# Create empty SQLite file to prevent errors if DB_CONNECTION=sqlite
RUN mkdir -p database && touch database/database.sqlite

RUN php artisan key:generate

RUN npm install && npm run build

RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

EXPOSE 8080
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
