FROM php:8.0-fpm-alpine
 
RUN apk update --no-cache \
&& apk add \
icu-dev \
oniguruma-dev \
tzdata

RUN rm -rf /var/cache/apk/*
 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
 
CMD ["php-fpm"]