FROM php:7.4-apache

# 1) Instala pacotes úteis + cliente MySQL
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libicu-dev \
    default-mysql-client && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# 2) Extensões PHP
RUN docker-php-ext-install pdo_mysql mysqli mbstring exif pcntl bcmath gd zip intl

# 3) Habilita rewrite do Apache
RUN a2enmod rewrite

RUN echo "ServerName localhost" > /etc/apache2/conf-available/servername.conf \
    && a2enconf servername

# 4) Define workdir
WORKDIR /var/www/html

# 5) Copia projeto
COPY . /var/www/html

# 6) Cria cache e sessions, ajusta permissões
RUN mkdir -p application/cache/sessions \
    && chown -R www-data:www-data application/cache \
    && chmod -R 0777 application/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 0755 /var/www/html

# 7) Adiciona entrypoint
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# 8) Entrypoint + CMD
ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
