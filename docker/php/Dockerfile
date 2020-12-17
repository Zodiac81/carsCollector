FROM php:7.4-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo_pgsql

RUN docker-php-ext-install pdo pdo_pgsql
RUN docker-php-ext-install sockets
RUN pecl install apcu

RUN apt-get update -qq\
&& apt-get install -y libzip-dev apt-utils curl nano \
&& pecl install xdebug \

RUN docker-php-ext-install zip unzip
RUN docker-php-ext-enable apcu

RUN dpkg --add-architecture i386

RUN apt-get update
RUN apt-get install -y libc6:i386 libx11-6:i386 gconf-service libasound2 libatk1.0-0 libatk-bridge2.0-0 libc6 \
libcairo2 libcups2 libdbus-1-3 libexpat1 libfontconfig1 libgcc1 libgconf-2-4 libgdk-pixbuf2.0-0 libglib2.0-0 \
libgtk-3-0 libnspr4 libpango-1.0-0 libpangocairo-1.0-0 libstdc++6 libx11-6 libx11-xcb1 libxcb1 libxcomposite1 \
libxcursor1 libxdamage1 libxext6 libxfixes3 libxi6 libxrandr2 libxrender1 libxss1 libxtst6 ca-certificates \
fonts-liberation libappindicator1 libnss3 lsb-release xdg-utils wget
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

EXPOSE 9000

WORKDIR /var/www/html/

RUN chmod +x /var/www/html/






