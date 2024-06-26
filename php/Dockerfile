FROM php:8.2-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN apt-get update \
    && apt-get install -y --no-install-recommends locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev;

RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
    mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql gd opcache intl zip calendar dom mbstring xsl
RUN pecl install apcu && docker-php-ext-enable apcu

RUN curl -sL https://deb.nodesource.com/setup_21.x | bash
RUN apt-get install nodejs -yqq

WORKDIR /var/www/

# Copy entrypoint script
# COPY entrypoint.sh /usr/local/bin/entrypoint.sh
# RUN chmod +x /usr/local/bin/entrypoint.sh

# Set the entrypoint script
# ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

# Run Apache in the foreground
CMD ["apache2-foreground"]
