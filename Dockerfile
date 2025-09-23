# Use the PHP image
FROM php:8.2-cli

USER root

# Set a working directory
WORKDIR /var/www

# Install dependencies
RUN docker-php-ext-install pdo pdo_mysql

# Copy from  Composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy app files
COPY . .

# Install PHP dependencies
RUN composer install

# Expose port for Laravel dev server
EXPOSE 8080

# Default command (run Laravel dev server)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]