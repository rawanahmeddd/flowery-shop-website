FROM php:8.2-apache

WORKDIR /var/www/html

COPY . .

RUN a2dismod mpm_prefork && a2enmod mpm_event && a2enmod rewrite

EXPOSE 80

CMD ["apache2-foreground"]

