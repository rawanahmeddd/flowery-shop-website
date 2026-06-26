FROM php:8.2-fpm

RUN apt-get update && apt-get install -y nginx && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
COPY . .

RUN mkdir -p /run/nginx

COPY nginx.conf /etc/nginx/sites-available/default

EXPOSE 80

CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]

