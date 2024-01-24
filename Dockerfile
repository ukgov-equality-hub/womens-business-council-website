FROM php:7.4-fpm

## Install php entension: ldap
#RUN apt-get update && \
#    apt-get install libldap2-dev -y && \
#    rm -rf /var/lib/apt/lists/* && \
#    docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ && \
#    docker-php-ext-install ldap
#
## Install php entension: curl
#RUN apt-get update && \
#    apt-get install pkg-config libcurl4-openssl-dev -y && \
#    rm -rf /var/lib/apt/lists/* && \
#    docker-php-ext-install curl
#
## Install php entension: exif
#RUN docker-php-ext-install exif
#
## Install php entension: fileinfo
#RUN docker-php-ext-install fileinfo
#
## Install php entension: gd
#RUN apt-get update && \
#    apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
#    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
#    docker-php-ext-install gd && \
#    rm -rf /var/lib/apt/lists/*
#
## Install php entension: imagick
#RUN apt-get update && \
#    apt-get install -y libmagickwand-dev && \
#    pecl install imagick && \
#    docker-php-ext-enable imagick && \
#    rm -rf /var/lib/apt/lists/*

# Install php entension: intl
RUN docker-php-ext-install intl

# Install php entension: mysqli
RUN docker-php-ext-install mysqli

## Install php entension: zip
#RUN apt-get update && \
#    apt-get install -y libzip-dev && \
#    docker-php-ext-install zip && \
#    rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Expose port 8080 (so we can connect to the server from outside the Docker container)
EXPOSE 8080

# Run the web server
# Note: we need to specify the IP address 0.0.0.0 to allow PHP to receive connections from other machines (i.e. your laptop)
CMD php -S 0.0.0.0:8080 -t /var/www/html
