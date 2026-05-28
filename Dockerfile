FROM php:8.2-apache

RUN docker-php-ext-install pdo_mysql mysqli \
    && rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* \
    && a2enmod mpm_prefork \
    && a2enmod rewrite

COPY php-codebase/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
