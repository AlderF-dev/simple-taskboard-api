# Use the PHP image
FROM php:8.2.19-fpm-alpine3.19

USER root

# Set a working directory
WORKDIR /var/www

# Install packages (nginx, supervisor)
RUN apk update && apk add --no-cache \
    nginx \
    nginx-mod-http-headers-more \
    supervisor

# Install dependencies
RUN docker-php-ext-install pdo pdo_mysql

# Copy app files
COPY . .

# nginx conf
RUN cp devops/nginx/nginx.conf /etc/nginx/nginx.conf
RUN cp devops/nginx/http.d/server.conf /etc/nginx/http.d/server.conf
RUN rm /etc/nginx/http.d/default.conf

# php-fpm conf
RUN cp devops/php-fpm/www.conf /usr/local/etc/php-fpm.d/www.conf

# Supervisor config
RUN mkdir /etc/supervisor
RUN cp devops/supervisor/supervisord.conf /etc/supervisor/supervisord.conf
RUN mkdir /etc/supervisor/conf.d
RUN cp devops/supervisor/conf.d/* /etc/supervisor/conf.d/
RUN mkdir /var/log/supervisor

# crontab
RUN cp devops/crontab/crontab /etc/crontabs/root

# Copy from  Composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies (only needed if it was a production build)
# RUN composer install

# Entrypoint
COPY devops/docker/entrypoint.sh /
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
