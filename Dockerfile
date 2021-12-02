#first
ARG PHP_EXTENSIONS="pdo_pgsql zip"
FROM thecodingmachine/php:7.3-v2-slim-apache as php_base
#ENV TEMPLATE_PHP_INI=production
ENV COMPOSER_MEMORY_LIMIT=-1
COPY --chown=docker:docker . /var/www/html
RUN composer update
# RUN composer install --quiet --optimize-autoloader --no-dev
RUN composer install