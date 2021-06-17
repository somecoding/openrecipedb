FROM composer:2 as COMPOSER
ENV COMPOSER_HOME=/usr/config/composer
ARG GITHUB_TOKEN
RUN composer config -g github-oauth.github.com $GITHUB_TOKEN

FROM php:8.0-fpm
ENV COMPOSER_HOME=/usr/config/composer
ARG USER_ID
ARG GROUP_ID
RUN usermod -u $USER_ID www-data && groupmod -g $GROUP_ID www-data

RUN apt-get update && apt-get install -y \
        htop \
        sudo \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        zip \
        unzip \
        curl \
        git \
        libicu-dev \
        libc6 \
        libxml2-dev \
        libonig-dev \
        libzip-dev \
        libmcrypt-dev \
        libsodium-dev \
        libcurl4-gnutls-dev \
        libldap-dev \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-install -j$(nproc) soap \
    && docker-php-ext-install -j$(nproc) mysqli \
    && docker-php-ext-install -j$(nproc) pdo_mysql \
    && docker-php-ext-install -j$(nproc) bcmath \
    && docker-php-ext-configure ldap \
    && docker-php-ext-install ldap

COPY --chown=www-data:www-data --from=COMPOSER /usr/bin/composer /usr/bin/composer
COPY --chown=www-data:www-data --from=COMPOSER /usr/config/composer /usr/config/composer
RUN mkdir -p /var/www/.ssh/ && \
    touch /var/www/.ssh/known_hosts && \
    ssh-keyscan github.com >> /var/www/.ssh/known_hosts

RUN apt-get update && pecl install -o -f redis-5.3.4 && rm -rf /tmp/pear && docker-php-ext-enable redis
RUN apt-get update && pecl install xdebug-3.0.3 && rm -rf /tmp/pear && docker-php-ext-enable xdebug
RUN apt-get autoremove -y && apt-get clean && rm -rf /var/lib/apt/lists/*

