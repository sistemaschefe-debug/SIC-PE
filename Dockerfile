FROM php:8.3-apache

RUN a2enmod rewrite

COPY sic/docker-php.ini /usr/local/etc/php/conf.d/sic-custom.ini

RUN docker-php-ext-install pdo_mysql mysqli gd

COPY --from=composer:2.8 /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

COPY sic/ /var/www/html/

RUN mkdir -p /var/www/html/doc_veiculos /var/www/html/imagens_notificacoes \
    && chown -R www-data:www-data /var/www/html/doc_veiculos /var/www/html/imagens_notificacoes

RUN composer install --no-interaction --optimize-autoloader --no-dev

RUN chown -R www-data:www-data /var/www/html/vendor

EXPOSE 80

CMD ["apache2-foreground"]
