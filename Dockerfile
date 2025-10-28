# Use the official PHP image with Apache
FROM php:8.2-apache

# Install PDO extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy project files into the container
COPY . /var/www/html/

# Expose port 10000 (Render expects this)
EXPOSE 10000

# Update Apache to listen on Render’s port
RUN sed -i 's/80/10000/' /etc/apache2/ports.conf /etc/apache2/sites-enabled/000-default.conf
