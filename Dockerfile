FROM composer:2.7 AS vendor
WORKDIR /app
COPY database/ database/
COPY composer.json composer.lock ./
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

FROM richarvey/php-fpm-nginx:3.1.6

ENV WEBROOT /var/www/html/public
ENV APP_ENV staging

WORKDIR /var/www/html

COPY . .
COPY --from=vendor /app/vendor/ ./vendor/

COPY .env.staging .env

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80