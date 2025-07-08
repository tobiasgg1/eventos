# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Copia los archivos del proyecto al directorio del servidor
COPY public/ /var/www/html/

# Habilita extensiones necesarias como mysqli
RUN docker-php-ext-install mysqli

# Da permisos adecuados
RUN chown -R www-data:www-data /var/www/html
