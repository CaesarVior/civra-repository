# Stage 1: Composer Build
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

FROM webdevops/php-nginx:8.3-alpine

WORKDIR /app

COPY --chown=application:application . .
COPY --from=vendor --chown=application:application /app/vendor/ ./vendor/

COPY --chown=application:application .env.staging .env

RUN chmod -R 775 /app/storage /app/bootstrap/cache

EXPOSE 80