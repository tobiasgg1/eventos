# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Copia los archivos del proyecto a la carpeta pública de Apache
COPY . /var/www/html/

# Habilita la extensión mysqli
RUN docker-php-ext-install mysqli

# Da permisos adecuados a los archivos
RUN chown -R www-data:www-data /var/www/html

