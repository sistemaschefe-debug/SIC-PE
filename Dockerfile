FROM php:8.3-apache

RUN a2enmod rewrite

COPY sic/docker-php.ini /usr/local/etc/php/conf.d/sic-custom.ini

RUN apt-get update && apt-get install -y --no-install-recommends \
    build-essential \
    git \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install -j$(nproc) pdo_mysql mysqli gd

COPY --from=composer:2.8 /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

COPY sic/ /var/www/html/

RUN mkdir -p /var/www/html/doc_veiculos /var/www/html/imagens_notificacoes \
    && chown -R www-data:www-data /var/www/html/doc_veiculos /var/www/html/imagens_notificacoes

RUN composer install --no-interaction --optimize-autoloader --no-dev --prefer-dist -vvv 2>&1 | head -100

EXPOSE 80

CMD ["apache2-foreground"]
