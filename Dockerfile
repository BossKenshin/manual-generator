# Use official PHP CLI image with PHP 8.1
FROM php:8.1-cli

# Install system dependencies and PHP extensions needed for Laravel
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    zip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql zip mbstring xml

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy application files
COPY . .

# Install PHP dependencies without dev packages and optimize autoloader
RUN composer install --no-dev --optimize-autoloader

# Cache Laravel config for better performance
RUN php artisan config:cache

# Expose port 8080 for Laravel's built-in server
EXPOSE 8080

# Run Laravel development server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
