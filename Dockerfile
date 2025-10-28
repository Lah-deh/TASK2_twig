# Use the official PHP image
FROM php:8.2-apache

# Install necessary extensions
RUN docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html/
WORKDIR /var/www/html/


EXPOSE 10000


CMD ["php", "-S", "0.0.0.0:10000", "-t", "/var/www/html"]
