FROM php:8.2-apache

RUN addgroup --g 998 groupcontainer
RUN adduser -u 1000 -G groupcontainer -h /home/containeruser -D containeruser
 
USER containeruser


RUN docker-php-ext-install mysqli