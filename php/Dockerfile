FROM php:8.2-fpm


WORKDIR /var/www/coupon

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    libonig-dev \
    unzip \
    && docker-php-ext-install intl mbstring zip pdo pdo_mysql \
    && pecl install redis \
    && docker-php-ext-enable redis

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer



CMD ["php-fpm"]
