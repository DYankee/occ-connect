FROM php:7.2-apache
COPY ./ /var/www/html/
RUN docker-php-ext-install pdo_mysl
RUN apt install php-mysqli
RUN docker-php-ext-install mysqli
CMD ["apache2ctl", "-D", "FOREGROUND"]