FROM php:8.1-apache

# Instalar extensiones necesarias para Laravel
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copiar el código del proyecto al contenedor
COPY . /var/www/html/

# Dar permisos a los archivos
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80
EXPOSE 80
