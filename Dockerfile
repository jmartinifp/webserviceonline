FROM php:8.2-fpm

RUN apt-get update && apt-get install -y nginx && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY . .

COPY nginx.conf /etc/nginx/nginx.conf

EXPOSE 80
]
