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

# --- 4. Set working directory and copy app files ---
WORKDIR /app
COPY . .

# --- 5. Install PHP & JS dependencies ---
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader

# Optional: Ensure .env exists (can customize this)
RUN cp .env.example .env || true


RUN php artisan key:generate


# --- 6. Build frontend assets using Vite ---
RUN npm install && npm run build

# --- 7. Cache Laravel config/routes/views (optional) ---
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# --- 8. Expose port and start Laravel app ---
EXPOSE 8080
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
